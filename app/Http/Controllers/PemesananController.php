<?php

namespace App\Http\Controllers;

use App\Models\DetailPemesanan;
use App\Models\Pemesanan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        // Ambil semua pemesanan dengan relasi user dan detail_pemesanan
        $pemesanans = Pemesanan::with(['user', 'detail_pemesanan'])->get();
        return view('admin.transaksi.pemesanan.index', compact('pemesanans'));
    }

    public function create()
    {
        $users = User::all();
        $produks = Produk::all();
        return view('admin.transaksi.pemesanan.create', compact('users', 'produks'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_harga' => 'required|integer',
            'tanggal_pemesanan' => 'required|date_format:Y-m-d\TH:i',
            'status_pemesanan' => 'required|string',
        ]);

        Pemesanan::create([
            'user_id' => $request->user_id,
            'total_harga' => $request->total_harga,
            'tanggal_pemesanan' => $request->tanggal_pemesanan,
            'status_pemesanan' => $request->status_pemesanan,
        ]);

        return redirect()->route('admin.transaksi.pemesanan.index')->with('success', 'Pemesanan berhasil ditambahkan.');
    }

    public function edit(Pemesanan $pemesanan)
    {
        $users = User::all();
        return view('admin.transaksi.pemesanan.edit', compact('pemesanan', 'users'));
    }

    public function update(Request $request, Pemesanan $pemesanan)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_harga' => 'required|integer',
            'tanggal_pemesanan' => 'required|date_format:Y-m-d\TH:i',
            'status_pemesanan' => 'required|string',
        ]);

        $pemesanan->update([
            'user_id' => $request->user_id,
            'total_harga' => $request->total_harga,
            'tanggal_pemesanan' => $request->tanggal_pemesanan,
            'status_pemesanan' => $request->status_pemesanan,
        ]);

        return redirect()->route('admin.transaksi.pemesanan.index')->with('success', 'Pemesanan berhasil diperbarui.');
    }

    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();

        return redirect()->route('admin.transaksi.pemesanan.index')->with('success', 'Pemesanan berhasil dihapus.');
    }
}
