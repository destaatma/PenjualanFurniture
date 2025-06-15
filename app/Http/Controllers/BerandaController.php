<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pemesanan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    // ✅ Method index untuk dashboard utama
    public function index()
    {
        $kategoriCount = Kategori::count();
        $produkCount = Produk::count();
        $pemesananCount = Pemesanan::count();
        $userCount = User::count();

        return view('admin.beranda', compact('kategoriCount', 'produkCount', 'pemesananCount', 'userCount'));
    }

    // ✅ Method untuk JSON chart
    public function chartPenjualan()
    {
        $data = Pemesanan::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as bulan, COUNT(*) as total")
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
            ->orderBy('bulan', 'asc')
            ->get();

        $labels = [];
        $totals = [];

        foreach ($data as $item) {
            $labels[] = date('F Y', strtotime($item->bulan . '-01'));
            $totals[] = $item->total;
        }

        return response()->json([
            'labels' => $labels,
            'totals' => $totals,
        ]);
    }
}
