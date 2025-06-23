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
        // Ambil semua pesanan milik user yang sedang login
        // Urutkan dari yang terbaru
        $pesanans = Pemesanan::with('pembayaran')
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
        // Cari pesanan berdasarkan ID, dan pastikan relasi 'detailPemesanan' beserta 'produk' di-load
        $pesanan = Pemesanan::with('detailPemesanan.produk')->findOrFail($id);

        // Keamanan: Pastikan pesanan ini milik user yang sedang login
        if ($pesanan->user_id !== Auth::id()) {
            abort(403, 'AKSES DITOLAK'); // Mencegah user melihat pesanan orang lain
        }

        // Kirim data pesanan ke view detail
        return view('detailpesanan', compact('pesanan'));
    }
}
