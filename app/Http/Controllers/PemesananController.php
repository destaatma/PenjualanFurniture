<?php

namespace App\Http\Controllers;

use App\Models\DetailPemesanan;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanans = Pemesanan::all();
        $detail_pemesanans = DetailPemesanan::all();
        $users = User::all();
        return view('admin.transaksi.pemesanan.index', compact('pemesanans', 'detail_pemesanans', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $detail_pemesanans = DetailPemesanan::all();
        $users = User::all();
        return view('admin.transaksi.pemesanan.create', compact('detail_pemesanans', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'detail_pemesanan_id' => 'required|exists:detail_pemesanans,id',
            'user_id' => 'required',
            'total_harga' => 'required|integer',
            'tanggal_pemesanan' => 'required|date_format:Y-m-d\TH:i',
            'status_pemesanan' => 'required|string',
        ]);

        Pemesanan::create($request->all());

        return redirect()->route('admin.transaksi.pemesanan.index')->with('success', 'Pemesanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemesanan $pemesanan)
    {
        //return view('admin.transaksi.pemesanan.show', compact('pemesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        $detail_pemesanans = DetailPemesanan::all();
        $users = User::all();
        return view('admin.transaksi.pemesanan.edit', compact('pemesanan', 'detail_pemesanans', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        $request->validate([
            'detail_pemesanan_id' => 'required|exists:detail_pemesanans,id',
            'user_id' => 'required',
            'total_harga' => 'required|integer',
            'tanggal_pemesanan' => 'required|date_format:Y-m-d\TH:i',
            'status_pemesanan' => 'required|string',
        ]);

        $pemesanan->update($request->all());

        return redirect()->route('admin.transaksi.pemesanan.index')->with('success', 'Pemesanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();

        return redirect()->route('admin.transaksi.pemesanan.index')->with('success', 'Pemesanan berhasil dihapus.');
    }
}
