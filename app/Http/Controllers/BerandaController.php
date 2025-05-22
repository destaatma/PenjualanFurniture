<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pemesanan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriCount = Kategori::count();
        $produkCount = Produk::count();
        $pemesananCount = Pemesanan::count();
        $userCount = User::count();
        return view('admin.beranda', compact('kategoriCount', 'produkCount', 'pemesananCount', 'userCount'));
    }
}
