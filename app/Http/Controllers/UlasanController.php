<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ulasans = Ulasan::with(['produk', 'user'])->get();
        // $produks dan $users tidak diperlukan di sini kecuali jika Anda menggunakannya untuk filtering/display tambahan
        // $produks = Produk::all();
        // $users = User::all();
        return view('admin.ulasan.index', compact('ulasans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produks = Produk::all();
        $users = User::all();
        return view('admin.ulasan.create', compact('produks', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'user_id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'nullable|string',
            // Tidak perlu validasi 'status' di sini karena kita akan mengaturnya secara internal
        ]);

        Ulasan::create([
            'produk_id' => $request->produk_id,
            'user_id' => $request->user_id,
            'rating' => $request->rating,
            'ulasan' => $request->ulasan,
            'status' => 'pending', // Tambahkan ini: Set status default 'pending'
        ]);

        return redirect()->route('admin.ulasan.index')->with('success', 'Ulasan berhasil ditambahkan dan menunggu persetujuan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ulasan $ulasan)
    {
        // Metode ini tidak digunakan dalam skema Anda saat ini.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ulasan $ulasan)
    {
        $produks = Produk::all();
        $users = User::all();
        $statuses = ['pending', 'published', 'rejected'];
        return view('admin.ulasan.edit', compact('ulasan', 'produks', 'users', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ulasan $ulasan)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'user_id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'nullable|string',
            'status' => 'required|in:pending,published,rejected', // Tambahkan ini: Validasi untuk status
        ]);

        $ulasan->update($request->all());

        return redirect()->route('admin.ulasan.index')->with('success', 'Ulasan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ulasan $ulasan)
    {
        $ulasan->delete();
        return redirect()->route('admin.ulasan.index')->with('success', 'Ulasan berhasil dihapus');
    }
}
