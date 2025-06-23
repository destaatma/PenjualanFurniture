<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanprodukController extends Controller
{
    /**
     * Menampilkan detail produk beserta ulasan-ulasannya.
     * Halaman ini juga akan berisi form untuk menambahkan ulasan baru.
     */
    public function show($id)
    {
        // Mengambil data produk beserta relasi kategori dan ulasan (termasuk data user yang memberi ulasan)
        // Hanya ambil ulasan yang berstatus 'published'
        $produk = Produk::with(['kategori', 'ulasans' => function ($query) {
            $query->where('status', 'published')->with('user');
        }])->findOrFail($id);

        // Menampilkan view 'produk' dan mengirim data produk
        return view('produk', compact('produk'));
    }

    /**
     * Menyimpan ulasan baru yang dikirim oleh pengguna.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'required|string',
        ]);

        Ulasan::create([
            'produk_id' => $request->produk_id,
            'user_id' => auth()->id(), // pastikan user sudah login
            'rating' => $request->rating,
            'ulasan' => $request->ulasan,
            'status' => 'pending', // Set status default 'pending' untuk ulasan yang baru dikirim oleh user
        ]);

        return redirect()->back()->with('success', 'Ulasan berhasil dikirim dan akan ditampilkan setelah disetujui.');
    }
}
