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
    // public function tambahKeKeranjang(Request $request, $id)
    // {
    //     if (!Auth::check()) {
    //         return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk menambahkan produk ke keranjang.');
    //     }
    //     $produk = Produk::findOrFail($id);

    //     // Ambil keranjang dari session
    //     $keranjang = session()->get('keranjang', []);

    //     // Cek apakah produk sudah ada di keranjang
    //     if (isset($keranjang[$id])) {
    //         // Jika produk sudah ada, tambahkan jumlahnya
    //         $keranjang[$id]['jumlah']++;
    //     } else {
    //         // Jika produk belum ada, tambahkan ke keranjang
    //         $keranjang[$id] = [
    //             'nama' => $produk->nama,
    //             'harga' => $produk->harga,
    //             'jumlah' => 1,
    //             'gambar' => $produk->gambar, // Jika Anda ingin menyimpan gambar
    //         ];
    //     }

    //     // Simpan kembali keranjang ke session
    //     session()->put('keranjang', $keranjang);

    //     return redirect('/keranjang')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    // }
    public function tambahKeKeranjang(Request $request, $id)
    {
        // if (!Auth::check()) {
        //     $redirectTo = $request->input('redirect_to', url()->previous());

        //     // Simpan URL tujuan ke session
        //     session(['url.intended' => $redirectTo]);

        //     return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        // }
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
