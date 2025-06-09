<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use App\Models\DetailPemesanan;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;

class PaymentController extends Controller
{
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
        // dd(config('services.midtrans.server_key'));
        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = false;
        Config::$is3ds = true;
        Config::$isSanitized = true;

        // Gunakan ID pemesanan langsung sebagai order_id Midtrans
        $orderId = (string) $pemesanan->id;

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
        try {
            $notif = new Notification();
            $orderId = $notif->order_id; // berisi ID dari pemesanan
            $transactionStatus = $notif->transaction_status;

            $pembayaran = Pembayaran::where('pemesanan_id', $orderId)->first();

            if (!$pembayaran) {
                return response()->json(['message' => 'Pembayaran tidak ditemukan.'], 404);
            }

            if ($transactionStatus === 'settlement') {
                $pembayaran->update([
                    'status_pembayaran' => 'Selesai',
                    'tanggal_pembayaran' => now()
                ]);
                $pembayaran->pemesanan()->update([
                    'status_pemesanan' => 'Selesai'
                ]);
            } elseif (in_array($transactionStatus, ['cancel', 'deny', 'expire'])) {
                $pembayaran->update(['status_pembayaran' => 'Gagal']);
                $pembayaran->pemesanan()->update(['status_pemesanan' => 'Gagal']);
            } elseif ($transactionStatus === 'pending') {
                $pembayaran->update(['status_pembayaran' => 'Menunggu']);
            }

            return response()->json(['message' => 'Notifikasi diproses']);
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

        if (!$user) {
            return redirect('/login')->with('error', 'Silakan login untuk melanjutkan pembelian.');
        }

        // Hitung total harga
        $totalHarga = $produk->harga * $jumlah;

        // Buat pemesanan
        $pemesanan = Pemesanan::create([
            'user_id' => $user->id,
            'status_pemesanan' => 'Menunggu Pembayaran',
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
                'status_pembayaran' => 'Menunggu',
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
}
