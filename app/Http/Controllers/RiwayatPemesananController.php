<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan; // Pastikan Anda mengimpor model Pemesanan
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatPemesananController extends Controller
{
    /**
     * Menampilkan daftar riwayat pemesanan milik pengguna yang sedang login.
     */
    public function index()
    {
        // PERBAIKAN: Mengganti 'detailPesanan' menjadi 'detailPemesanan' agar sesuai dengan nama relasi
        // Ini akan mengambil semua data yang dibutuhkan dalam satu query efisien.
        $pesanans = Pemesanan::with(['pembayaran', 'pengiriman', 'detailPemesanan.produk'])
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10); // Gunakan paginate untuk halaman yang lebih rapi

        // Kirim data pesanan ke view
        return view('riwayat', compact('pesanans'));
    }

    /**
     * Menampilkan detail dari satu pesanan spesifik.
     */
    public function show($id)
    {
        // PERBAIKAN: Tambahkan juga relasi 'pengiriman' dan 'pembayaran' di sini
        $pesanan = Pemesanan::with(['detailPemesanan.produk', 'pembayaran', 'pengiriman'])->findOrFail($id);

        // Keamanan: Pastikan pesanan ini milik user yang sedang login
        if ($pesanan->user_id !== Auth::id()) {
            abort(403, 'AKSES DITOLAK'); // Mencegah user melihat pesanan orang lain
        }

        // Kirim data pesanan ke view detail
        return view('detailpesanan', compact('pesanan'));
    }
}
