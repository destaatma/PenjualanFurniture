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
        $ulasans = Ulasan::all();
        $produks = Produk::all();
        $users = User::all();
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
        ]);

        Ulasan::create($request->all());

        return redirect()->route('admin.ulasan.index')->with('success', 'Ulasan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ulasan $ulasan)
    {
        //return view('admin.ulasan.show', compact('ulasan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ulasan $ulasan)
    {
        $produks = Produk::all();
        $users = User::all();
        return view('admin.ulasan.edit', compact('ulasan', 'produks', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ulasan $ulasan)
    {
        dd($request->all());
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'user_id' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'nullable|string',
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
