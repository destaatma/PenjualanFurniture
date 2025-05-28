<?php

namespace App\Http\Controllers;

use App\Models\DetailPemesanan;
use App\Models\Produk;
use Illuminate\Http\Request;

class DetailPemesananController extends Controller
{
    /**
     * Menampilkan daftar detail pemesanan.
     */
    public function index()
    {
        $detail_pemesanans = DetailPemesanan::all();
        return view('admin.transaksi.detail_pemesanan.index', compact('detail_pemesanans'));
    }

    /**
     * Menampilkan form untuk membuat detail pemesanan baru.
     */
    public function create()
    {
        $produks = Produk::all();
        return view('admin.transaksi.detail_pemesanan.create', compact('produks'));
    }

    /**
     * Menyimpan data detail pemesanan baru ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah_produk' => 'required|integer|min:1',
            'harga' => 'required|integer|min:0',
            'harga_subtotal' => 'required|integer|min:0',
        ]);

        DetailPemesanan::create($request->all());

        return redirect()->route('admin.transaksi.detail_pemesanan.index')->with('success', 'Detail pemesanan berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail pemesanan berdasarkan ID.
     */
    public function show(DetailPemesanan $detailPemesanan)
    {
        //return view('admin.transaksi.detail_pemesanan.show', compact('detailPemesanan'));
    }

    /**
     * Menampilkan form edit detail pemesanan.
     */
    public function edit(DetailPemesanan $detailPemesanan)
    {
        $produks = Produk::all();
        return view('admin.transaksi.detail_pemesanan.edit', compact('detailPemesanan', 'produks'));
    }

    /**
     * Memperbarui data detail pemesanan yang sudah ada.
     */
    public function update(Request $request, DetailPemesanan $detailPemesanan)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah_produk' => 'required|integer|min:1',
            'harga' => 'required|integer|min:0',
            'harga_subtotal' => 'required|integer|min:0',
        ]);

        $detailPemesanan->update($request->all());

        return redirect()->route('admin.transaksi.detail_pemesanan.index')->with('success', 'Detail pemesanan berhasil diperbarui.');
    }

    /**
     * Menghapus data detail pemesanan dari database.
     */
    public function destroy(DetailPemesanan $detailPemesanan)
    {
        $detailPemesanan->delete();

        return redirect()->route('admin.transaksi.detail_pemesanan.index')->with('success', 'Detail pemesanan berhasil dihapus.');
    }
}
