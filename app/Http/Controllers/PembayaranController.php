<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pemesanan;
use App\Services\FonnteService;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayarans = Pembayaran::with('pemesanan.user')->latest()->get();
        $pemesanans = Pemesanan::all(); 
        return view('admin.transaksi.pembayaran.index', compact('pembayarans', 'pemesanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pemesanans = Pemesanan::with('user')->get();

        return view('admin.transaksi.pembayaran.create', compact('pemesanans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pemesanan_id' => 'required|exists:pemesanans,id',
            'snap_token' => 'nullable',
            'jumlah_bayar' => 'required|numeric',
            'tanggal_pembayaran' => 'required|date_format:Y-m-d\TH:i',
            'status_pembayaran' => 'required|string|in:Menunggu,Dikonfirmasi,Selesai',
        ]);

        Pembayaran::create([
            'pemesanan_id' => $request->pemesanan_id,
            'snap_token' => $request->token,
            'jumlah_bayar' => $request->jumlah_bayar,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'status_pembayaran' => $request->status_pembayaran,
        ]);

        return redirect()->route('admin.transaksi.pembayaran.index')->with('success', 'Pembayaran berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        $pemesanans = Pemesanan::all();
        return view('admin.transaksi.pembayaran.edit', compact('pembayaran', 'pemesanans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'pemesanan_id' => 'required|exists:pemesanans,id',
            'snap_token' => 'nullable|string|unique:pembayarans,snap_token,' . $pembayaran->id,
            'jumlah_bayar' => 'required|numeric',
            'tanggal_pembayaran' => 'required|date_format:Y-m-d\TH:i',
            'status_pembayaran' => 'required|string|in:Menunggu,Dikonfirmasi,Selesai',
        ]);

        $pembayaran->update([
            'pemesanan_id' => $request->pemesanan_id,
            'snap_token' => $request->token,
            'jumlah_bayar' => $request->jumlah_bayar,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'status_pembayaran' => $request->status_pembayaran,
        ]);

        return redirect()->route('admin.transaksi.pembayaran.index')->with('success', 'Pembayaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect()->route('admin.transaksi.pembayaran.index')->with('success', 'Pembayaran berhasil dihapus.');
    }

    public  function Export()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new \App\Exports\PembayaranExport, 'pembayaran.xlsx');
    }
}
