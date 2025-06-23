<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pembayaran;
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
    // public function chartPenjualan()
    // {
    //     $data = Pemesanan::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as bulan, COUNT(*) as total")
    //         ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
    //         ->orderBy('bulan', 'asc')
    //         ->get();

    //     $labels = [];
    //     $totals = [];

    //     foreach ($data as $item) {
    //         $labels[] = date('F Y', strtotime($item->bulan . '-01'));
    //         $totals[] = $item->total;
    //     }

    //     return response()->json([
    //         'labels' => $labels,
    //         'totals' => $totals,
    //     ]);
    // }
    public function chartPenjualan()
    {
        $data = Pembayaran::selectRaw("DATE_FORMAT(created_at, '%M %Y') as bulan, status_pembayaran, COUNT(*) as total")
            ->groupBy('bulan', 'status_pembayaran')
            ->orderByRaw("MIN(created_at)")
            ->get();

        $labels = [];
        $selesai = [];
        $belum = [];

        foreach ($data->groupBy('bulan') as $bulan => $items) {
            $labels[] = $bulan;

            $selesaiCount = $items->filter(fn($item) => strtolower($item->status_pembayaran) === 'selesai')->sum('total');
            $belumCount = $items->filter(fn($item) => strtolower($item->status_pembayaran) !== 'selesai')->sum('total');

            $selesai[] = $selesaiCount;
            $belum[] = $belumCount;
        }

        return response()->json([
            'labels' => $labels,
            'selesai' => $selesai,
            'belum' => $belum,
        ]);
    }
}
