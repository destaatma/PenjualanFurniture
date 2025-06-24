<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telpon' => ['required', 'string', 'max:15'],
        ]);

        $user = User::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'telpon' => $validated['telpon'],
            'role_id' => 2, // Default sebagai user biasa
        ]);
        // 3. Memicu event 'Registered'
        // Ini akan secara otomatis mengirim email verifikasi ke user baru.
        event(new Registered($user));

        // 4. Redirect ke halaman notifikasi verifikasi
        // Inilah bagian yang paling penting untuk alur Anda.
        return redirect()->route('verification.notice')->with('status', 'Link verifikasi telah dikirim ke email Anda!');
    }

    // Auth::login($user);

    //     return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    // }
}
