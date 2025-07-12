<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Pengiriman;
use App\Services\FonnteService;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengirimans = Pengiriman::with('pemesanan.user', 'pemesanan.detailPemesanan.produk')->latest()->get();
        return view('admin.transaksi.pengiriman.index', compact('pengirimans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pemesanans = Pemesanan::all(); // Ambil daftar pemesanan untuk dropdown
        return view('admin.transaksi.pengiriman.create', compact('pemesanans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pemesanan_id' => 'required|exists:pemesanans,id',
            'tanggal_pengiriman' => 'required|date_format:Y-m-d\TH:i',
            'status_pengiriman' => 'required|string',
        ]);

        Pengiriman::create($request->all());

        return redirect()->route('admin.transaksi.pengiriman.index')
            ->with('success', 'Pengiriman berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengiriman $pengiriman)
    {
        $pemesanans = Pemesanan::all();
        return view('admin.transaksi.pengiriman.edit', compact('pengiriman', 'pemesanans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengiriman $pengiriman)
    {
        $request->validate([
            'pemesanan_id' => 'required|exists:pemesanans,id',
            'tanggal_pengiriman' => 'required|date_format:Y-m-d\TH:i',
            'status_pengiriman' => 'required|string',
        ]);

        return redirect()->route('admin.transaksi.pengiriman.index')
            ->with('success', 'Pengiriman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengiriman $pengiriman)
    {
        $pengiriman->delete();

        return redirect()->route('admin.transaksi.pengiriman.index')
            ->with('success', 'Pengiriman berhasil dihapus.');
    }
}
