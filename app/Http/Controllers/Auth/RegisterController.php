<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Tampilkan form registrasi.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Proses data registrasi.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telepon' => ['required', 'string', 'max:15'],
            'alamat' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'nama' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'telepon' => $validated['telepon'],
            'alamat' => $validated['alamat'],
        ]);

        Auth::login($user);

        return redirect()->intended('dashboard');
    }
}
