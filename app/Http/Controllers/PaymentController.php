<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use App\Models\DetailPemesanan;
use App\Services\FonnteService;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;
use Carbon\Carbon; // <-- TAMBAHKAN
use Illuminate\Support\Facades\Log; // <-- TAMBAHKAN
// use App\Services\Fonnte; // <-- Sesuaikan dengan lokasi Fonnte Service Anda

class PaymentController extends Controller
{
    protected $fonnte;

    public function __construct()
    {
        // Inisialisasi Fonnte di sini
        $this->fonnte = new FonnteService();
    }

    public function showForm()
    {
        $keranjangs = session()->get('keranjang', []);
        return view('keranjang', compact('keranjangs'));
    }

    public function pay(Request $request)
    {
        $keranjang = session('keranjang', []);
        if (empty($keranjang)) {
            return response()->json(['error' => 'Keranjang kosong.'], 400);
        }

        $user = Auth::user();
        $produkList = [];
        $totalHarga = 0;

        // Ambil jumlah dari input frontend
        $jumlahInput = collect($request->keranjangs ?? [])->pluck('jumlah', 'id');

        foreach ($keranjang as $id => $item) {
            if ($jumlahInput->has($id)) {
                $keranjang[$id]['jumlah'] = $jumlahInput[$id];
            }

            $produkList[] = [
                'id' => $id,
                'price' => $item['harga'],
                'quantity' => $keranjang[$id]['jumlah'],
                'name' => substr(preg_replace('/[^A-Za-z0-9 ]/', '', $item['nama']), 0, 50),
                'total' => $item['harga'] * $keranjang[$id]['jumlah']
            ];

            $totalHarga += $item['harga'] * $keranjang[$id]['jumlah'];
        }
        // dd($produkList, $keranjang);

        $pemesanan = Pemesanan::create([
            'user_id' => $user->id,
            'total_harga' => $totalHarga,
            'tanggal_pemesanan' => now(),
            'status_pemesanan' => 'Menunggu Pembayaran'
        ]);
        foreach ($produkList as $produk) {
            DetailPemesanan::create([
                'pemesanan_id' => $pemesanan->id,
                'produk_id' => $produk['id'],
                'jumlah_produk' => $produk['quantity'],
                'harga' => $produk['price'],
                'harga_subtotal' => $produk['total'],
            ]);
        }

        // === Panggil Notifikasi Fonnte ===
        $this->_sendOrderNotification($pemesanan);
        // ===================================

        // dd(config('services.midtrans.server_key'));
        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = false;
        Config::$is3ds = true;
        Config::$isSanitized = true;

        // Gunakan ID pemesanan langsung sebagai order_id Midtrans
        $orderId = 'ORDER-' . $pemesanan->id . '-' . uniqid();

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $totalHarga
            ],
            'customer_details' => [
                'first_name' => $user->nama,
                'email' => $user->email
            ],
            'item_details' => $produkList
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            Pembayaran::create([
                'pemesanan_id' => $pemesanan->id,
                'snap_token' => $snapToken,
                'jumlah_bayar' => $totalHarga,
                'tanggal_pembayaran' => now(),
                'status_pembayaran' => 'Menunggu'
            ]);

            session()->forget('keranjang');

            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Gagal memproses pembayaran.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function handleNotification(Request $request)
    {
        // Konfigurasi server key Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production', false);

        try {
            $notif = new Notification();

            $transactionStatus = $notif->transaction_status;
            $fraudStatus = $notif->fraud_status;
            $orderIdMidtrans = $notif->order_id;

            // --- PERBAIKAN PENTING: Mengurai ID Pemesanan dari Order ID Midtrans ---
            // Asumsi format: 'ORDER-{id_pemesanan}-{uniqid}'
            $orderParts = explode('-', $orderIdMidtrans);
            if (count($orderParts) < 2) {
                Log::error('Format order_id Midtrans tidak valid: ' . $orderIdMidtrans);
                return response()->json(['message' => 'Format order_id tidak valid'], 400);
            }
            $pemesananId = $orderParts[1];
            // --------------------------------------------------------------------

            $pemesanan = Pemesanan::find($pemesananId);

            if (!$pemesanan) {
                return response()->json(['message' => 'Pemesanan tidak ditemukan.'], 404);
            }

            // Hindari proses ganda
            if ($pemesanan->status_pemesanan === 'Selesai') {
                return response()->json(['message' => 'Pembayaran sudah diproses.']);
            }

            if ($transactionStatus == 'capture') {
                if ($fraudStatus == 'accept') {
                    $transactionStatus = 'settlement';
                }
            }

            if ($transactionStatus == 'settlement') {
                // Update status pemesanan menjadi Selesai
                $pemesanan->status_pemesanan = 'Selesai';
                $pemesanan->save();

                // Update juga status di tabel pembayaran jika ada
                $pemesanan->pembayaran()->update(['status_pembayaran' => 'Selesai']);

                // --- PANGGIL FUNGSI NOTIFIKASI PEMBAYARAN SUKSES ---
                $this->_sendPaymentSuccessNotification($pemesanan);
            } elseif (in_array($transactionStatus, ['cancel', 'deny', 'expire'])) {
                $pemesanan->status_pemesanan = 'Gagal';
                $pemesanan->save();
                $pemesanan->pembayaran()->update(['status_pembayaran' => 'Gagal']);
            }

            return response()->json(['message' => 'Notifikasi berhasil diproses.']);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Gagal memproses notifikasi.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function directBuy(Request $request)
    {
        $produk = Produk::findOrFail($request->produk_id);
        $jumlah = max(1, (int) $request->jumlah);
        $user = Auth::user();

        // if (!$user) {
        //     return redirect('/login')->with('error', 'Silakan login untuk melanjutkan pembelian.');
        // }
        if (!Auth::check()) {
            // Simpan URL redirect ke session
            session(['url.intended' => $request->input('redirect_to', url()->previous())]);
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Hitung total harga
        $totalHarga = $produk->harga * $jumlah;

        // Buat pemesanan
        $pemesanan = Pemesanan::create([
            'user_id' => $user->id,
            'status_pemesanan' => 'selesai',
            'total_harga' => $totalHarga,
            'tanggal_pemesanan' => now()
        ]);

        // Buat detail pemesanan
        DetailPemesanan::create([
            'pemesanan_id' => $pemesanan->id,
            'produk_id' => $produk->id,
            'jumlah_produk' => $jumlah,
            'harga' => $produk->harga,
            'harga_subtotal' => $totalHarga
        ]);

        // === Panggil Notifikasi Fonnte ===
        $this->_sendOrderNotification($pemesanan);
        // ===================================

        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = false;
        Config::$is3ds = true;
        Config::$isSanitized = true;

        // Buat order_id yang unik agar tidak bentrok
        $orderId = 'ORDER-' . $pemesanan->id . '-' . uniqid();

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $totalHarga,
            ],
            'customer_details' => [
                'first_name' => $user->nama,
                'email' => $user->email,
            ],
            'item_details' => [[
                'id' => $produk->id,
                'price' => $produk->harga,
                'quantity' => $jumlah,
                'name' => substr(preg_replace('/[^A-Za-z0-9 ]/', '', $produk->nama), 0, 50),
            ]]
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            // Simpan ke tabel pembayaran
            Pembayaran::create([
                'pemesanan_id' => $pemesanan->id,
                'snap_token' => $snapToken,
                'jumlah_bayar' => $totalHarga,
                'tanggal_pembayaran' => now(),
                'status_pembayaran' => 'selesai',
            ]);

            return view('payment', [
                'snapToken' => $snapToken,
                'order' => $pemesanan
            ]);
        } catch (\Exception $e) {
            // Hapus pemesanan dan detail jika Midtrans gagal
            $pemesanan->delete();
            return redirect()->back()->with('error', 'Gagal memproses pembayaran: ' . $e->getMessage());
        }
    }

    public function success()
    {
        $user = Auth::user();
        $pemesananTerakhir = Pemesanan::where('user_id', $user->id)
            ->where('status_pemesanan', 'Selesai')
            ->latest()
            ->with('pembayaran', 'detailPemesanan')
            ->first();

        return view('success', compact('pemesananTerakhir'));
    }
    /**
     * Private function untuk mengirim notifikasi pesanan baru.
     *
     * @param \App\Models\Pemesanan $pemesanan
     * @return void
     */
    private function _sendOrderNotification(Pemesanan $pemesanan)
    {
        try {
            $customer = $pemesanan->user; // Ambil data user dari relasi

            if ($customer) {
                // --- Notifikasi untuk Admin (Nomor Tetap) ---
                $adminNumber = '6285737427393'; // GANTI DENGAN NOMOR WA ADMIN ANDA
                $messageForAdmin = "🔔 *Pemesanan Baru Diterima*\n\n";
                $messageForAdmin .= "Halo Admin, ada pesanan baru yang masuk:\n\n";
                $messageForAdmin .= "👤 *Nama Pelanggan:* {$customer->nama}\n";
                $messageForAdmin .= "📞 *No Telepon:* " . ($customer->telpon ?? '-') . "\n\n";
                $messageForAdmin .= "--- *Detail Pesanan* ---\n";
                $messageForAdmin .= "📅 *Tanggal Pesan:* " . Carbon::parse($pemesanan->tanggal_pemesanan)->isoFormat('dddd, D MMMM YYYY HH:mm') . "\n";
                $messageForAdmin .= "💰 *Total Harga:* Rp " . number_format($pemesanan->total_harga, 0, ',', '.') . "\n";
                $messageForAdmin .= "🚦 *Status Awal:* {$pemesanan->status_pemesanan}\n\n";
                $messageForAdmin .= "Mohon segera diproses di panel admin. Terima kasih.";

                // Ganti baris di bawah dengan implementasi Fonnte Anda

                $this->fonnte->sendAdvancedMessage([
                    'target' => $adminNumber,
                    'message' => $messageForAdmin,
                ]);

                // --- Notifikasi Konfirmasi untuk Customer (Nomor Dinamis) ---

                // Memeriksa apakah customer memiliki nomor telepon
                if ($customer->telpon) {

                    // 1. Membersihkan dan memformat nomor telepon
                    $originalUserNumber = $customer->telpon;
                    $cleanedUserNumber = preg_replace('/[^0-9]/', '', $originalUserNumber);
                    $userNumberFormatted = null;

                    if (str_starts_with($cleanedUserNumber, '62')) {
                        $userNumberFormatted = $cleanedUserNumber;
                    } elseif (str_starts_with($cleanedUserNumber, '0')) {
                        $userNumberFormatted = '62' . substr($cleanedUserNumber, 1);
                    }

                    // Hanya lanjut jika format nomor telepon valid
                    if ($userNumberFormatted) {

                        // --- Pesan Notifikasi Tunggal: Menunggu Pembayaran ---
                        // Logika if/else dihapus, sekarang hanya ada satu jenis pesan yang dikirim.
                        $messageForUser  = "� *Pesanan Diterima - Menunggu Pembayaran*\n\n";
                        $messageForUser .= "Halo *{$customer->nama}*,\n\n";
                        $messageForUser .= "Terima kasih, pemesanan yang Anda lakukan telah kami terima. Mohon segera selesaikan pembayaran agar pesanan dapat segera kami proses.\n\n";
                        $messageForUser .= "*DETAIL PESANAN:*\n";
                        $messageForUser .= "🏷️ *ID Pesanan:* #{$pemesanan->id}\n";
                        $messageForUser .= "📅 *Tanggal Pesan:* " . Carbon::parse($pemesanan->tanggal_pemesanan)->locale('id')->isoFormat('dddd, D MMMM YYYY') . "\n";
                        $messageForUser .= "💰 *Total Tagihan:* Rp " . number_format($pemesanan->total_harga, 0, ',', '.') . "\n\n";
                        $messageForUser .= "Kami akan segera memberikan update selanjutnya setelah pembayaran Anda kami konfirmasi/terima dan setelah melakukan pembayaran konfirmasi dengan balas pesan ini.";
                        $messageForUser .= "Terima kasih!";

                        // Mengirim pesan yang sudah disiapkan
                        $this->fonnte->sendAdvancedMessage([
                            'target' => $userNumberFormatted,
                            'message' => $messageForUser,
                        ]);
                    }
                }
            }
        } catch (\Exception $e) {
            Log::error('Gagal saat mengirim notifikasi WA (pemesanan baru): ' . $e->getMessage());
        }
    }
}
