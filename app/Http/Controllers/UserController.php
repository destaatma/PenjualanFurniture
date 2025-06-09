<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'email'  => 'required|email|max:255|unique:users,email,' . $id,
            'telpon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'nama'   => $request->nama,
            'email'  => $request->email,
            'telpon' => $request->telpon,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id); // Ambil data user berdasarkan ID
        $user->delete(); // Hapus user dari database

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dihapus');
    }
}
