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
    public function showform()
    {
        $produks = Produk::all();
        return view('user.form', compact('produks'));
    }

    public function pay(Request $request)
    {
        $keranjangs = session('keranjang', []);

        if (empty($keranjangs)) {
            return response()->json(['error' => 'Keranjang kosong.'], 400);
        }

        $user = Auth::user();
        $produkList = collect([]);
        $totalHarga = 0;

        foreach ($keranjangs as $id => $item) {
            // Sanitasi nama produk: hanya karakter valid dan max 50 karakter
            $namaProduk = substr(preg_replace('/[^A-Za-z0-9 ]/', '', $item['nama']), 0, 50);

            $produkList->push([
                'id' => $id,
                'price' => $item['harga'],
                'quantity' => $item['jumlah'],
                'name' => $namaProduk,
            ]);

            $totalHarga += $item['harga'] * $item['jumlah'];
        }

        // Buat detail dan pemesanan
        $detail = DetailPemesanan::create([
            'keterangan' => 'Pesanan dari keranjang',
        ]);

        $pemesanan = Pemesanan::create([
            'user_id' => $user->id,
            'detail_pemesanan_id' => $detail->id,
            'total_harga' => $totalHarga,
            'tanggal_pemesanan' => now(),
            'status_pemesanan' => 'Menunggu Pembayaran',
        ]);

        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$is3ds = true;

        $orderId = 'ORDER-' . $pemesanan->id . '-' . time();

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $totalHarga,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
            'item_details' => $produkList->toArray(),
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            Pembayaran::create([
                'pemesanan_id' => $pemesanan->id,
                'snap_token' => $snapToken,
                'order_id' => $orderId, // Tambahkan kolom ini di DB kalau belum
                'jumlah_bayar' => $totalHarga,
                'tanggal_pembayaran' => now(),
                'status_pembayaran' => 'Menunggu',
            ]);

            session()->forget('keranjang');

            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Gagal memproses pembayaran.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function handleNotification(Request $request)
    {
        try {
            $notif = new Notification();

            $orderId = $notif->order_id;
            $transactionStatus = $notif->transaction_status;

            $pembayaran = Pembayaran::where('order_id', $orderId)->first();

            if (!$pembayaran) {
                return response()->json(['message' => 'Pembayaran tidak ditemukan.'], 404);
            }

            if ($transactionStatus === 'settlement') {
                $pembayaran->update([
                    'status_pembayaran' => 'Selesai',
                    'tanggal_pembayaran' => now(),
                ]);
                $pembayaran->pemesanan()->update([
                    'status_pemesanan' => 'Selesai',
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
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function success()
    {
        return view('user.success');
    }
}
