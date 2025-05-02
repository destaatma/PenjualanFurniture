<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pembayaran::create([
            'pembayaran_id' => 1,
            'token' => '',
            'total_harga' => '1000000',
            'tanggal_pembayaran' => Carbon::now(),
            'status_pembayaran' => 'gagal',
        ]);
        Pembayaran::create([
            'pembayaran_id' => 2,
            'token' => '',
            'total_harga' => '2000000',
            'tanggal_pembayaran' => Carbon::now(),
            'status_pembayaran' => 'selesai',
        ]);
        Pembayaran::create([
            'pembayaran_id' => '',
            'token' => 3,
            'total_harga' => '1000000',
            'tanggal_pembayaran' => Carbon::now(),
            'status_pembayaran' => 'gagal',
        ]);
    }
}
