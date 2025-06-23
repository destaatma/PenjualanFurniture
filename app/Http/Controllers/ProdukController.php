<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all();
        $kategoris = Kategori::all();
        return view('admin.produk.index', compact('produks', 'kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        $stokOptions = ['ready', 'preorder']; // Opsi untuk kolom 'stok'
        return view('admin.produk.create', compact('kategoris', 'stokOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'stok' => 'required|string|in:ready,preorder',
            'gambar' => 'nullable',
        ]);

        // Simpan gambar ke storage
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('produk', 'public');
            $data['gambar'] = $gambarPath;
        }

        Produk::create($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        return view('admin.produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {

        $kategoris = Kategori::all(); // Ambil semua kategori untuk dropdown
        $stokOptions = ['ready', 'preorder']; // Opsi untuk kolom 'stok'
        return view('admin.produk.edit', compact('produk', 'kategoris', 'stokOptions'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $data = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric',
            'stok' => 'required|string|in:ready,preorder',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Periksa apakah ada gambar baru yang diunggah
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('produk', 'public');
            $data['gambar'] = $gambarPath;
        }

        $produk->update($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('admin.produk.index')->with('success', 'Kategori berhasil dihapus');
    }

    public function ulasan() {}
}
