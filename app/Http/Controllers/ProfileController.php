<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show(): View
    {
        $user = Auth::user()->load('profile');
        return view('profil.profile', compact('user'));
    }

    public function edit(): View
    {
        $user = Auth::user()->load('profile');
        return view('profil.editadmin', compact('user'));
    }

    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();

        $request->validate([
            'nama'        => 'required|string|max:255',
            'email'       => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'telpon'      => 'required|string|max:20',
            'alamat'      => 'nullable|string|max:255',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password'    => 'nullable|string|min:8|confirmed',
        ]);

        // Update data dasar user
        $user->update($request->only('nama', 'email', 'telpon'));

        // Update password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        // --- LOGIKA PROFIL YANG DIPERBAIKI UNTUK MENGHINDARI ERROR ---

        // 1. Ambil profil yang ada atau buat instance baru jika belum ada
        $profile = $user->profile()->firstOrNew(['users_id' => $user->id]);

        // 2. Tetapkan (update) alamat dari request
        $profile->alamat = $request->input('alamat');

        // 3. Proses upload foto profil jika ada file yang di-upload
        if ($request->hasFile('foto_profil')) {
            // Hapus foto lama jika ada
            if ($profile->foto_profil) {
                Storage::disk('public')->delete($profile->foto_profil);
            }
            // Simpan foto baru dan dapatkan path-nya
            $path = $request->file('foto_profil')->store('profile-photos', 'public');
            $profile->foto_profil = $path;
        } elseif (!$profile->exists) {
            // 4. INI BAGIAN PENTING: Jika ini profil BARU dan TIDAK ADA foto yang di-upload,
            // berikan nilai default (string kosong) untuk menghindari error SQL.
            // Ini hanya akan dieksekusi sekali saat profil dibuat.
            $profile->foto_profil = '';
        }

        // 5. Simpan data profil (baik yang baru dibuat maupun yang sudah ada)
        $profile->save();

        return redirect()->route('profil.show')->with('success', 'Profil berhasil diperbarui!');
    }
}
