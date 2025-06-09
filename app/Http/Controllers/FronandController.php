<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class FronandController extends Controller
{
    public function produk(Request $request)
    {
        $kategoris = Kategori::all();
        $produks = Produk::all();

        // Ambil produk berdasarkan kategori jika ada filter
        $produkQuery = Produk::query();

        if ($request->has('kategori_id')) {
            $produkQuery->where('kategori_id', $request->kategori_id);
        }

        $produks = $produkQuery->get();

        return view('produk', compact('kategoris', 'produks'));
    }

    public function show($id)
    {
        $produks = Produk::all(); {
            // Ambil produk berdasarkan ID
            $produk = Produk::findOrFail($id);
            $ulasans = $produk->ulasan; // Asumsi ada relasi ulasan di model Produk
            return view('detail', compact('produk', 'ulasans'));
        }
    }
}
