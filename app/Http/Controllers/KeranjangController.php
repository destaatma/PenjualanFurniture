<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    /**
     * Tambah produk ke keranjang
     */
    public function tambahKeKeranjang(Request $request, $id)
    {
        if (!Auth::check()) {
            $redirectTo = $request->input('redirect_to', url()->previous());
            session(['url.intended' => $redirectTo]);

            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }


        // Jika sudah login, lanjut tambah ke keranjang
        $produk = Produk::findOrFail($id);
        $keranjang = session()->get('keranjang', []);

        if (isset($keranjang[$id])) {
            $keranjang[$id]['jumlah']++;
        } else {
            $keranjang[$id] = [
                'nama' => $produk->nama,
                'harga' => $produk->harga,
                'jumlah' => 1,
                'gambar' => $produk->gambar,
            ];
        }

        session()->put('keranjang', $keranjang);

        return redirect('/keranjang')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }


    /**
     * Tampilkan keranjang
     */
    public function keranjang()
    {
        $keranjangs = session()->get('keranjang', []);
        return view('keranjang', compact('keranjangs'));
    }

    /**
     * Proses checkout
     */
    public function hapus($id)
    {
        $keranjang = session()->get('keranjang');
        if (isset($keranjang[$id])) {
            unset($keranjang[$id]);
            session()->put('keranjang', $keranjang);
            return redirect('/keranjang')->with('success', 'Produk berhasil dihapus dari keranjang!');
        }
        return redirect('/keranjang')->with('error', 'Produk tidak ditemukan di keranjang.');
    }
}
