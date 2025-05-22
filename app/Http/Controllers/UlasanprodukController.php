<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanprodukController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'required|string|max:1000',
        ]);
        // Simpan ulasan
        Ulasan::create([
            'produk_id' => $request->produk_id,
            'user_id' => $request->user_id,
            'rating' => $request->rating,
            'ulasan' => $request->ulasan,
        ]);
        // Redirect kembali ke halaman produk dengan pesan sukses
        return redirect()->back()->with('success', 'Ulasan berhasil ditambahkan!');
    }
}
