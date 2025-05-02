<?php

namespace Database\Seeders;

use App\Models\Pemesanan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pemesanan::create([
            'detail_pemesanan_id' => '',
            'user_id' => 1,
            'total_harga' => '1000000',
            'tanggal_pemesanan' => Carbon::now(),
            'status_pemesanan' => 'sedang diproses',
        ]);
        Pemesanan::create([
            'detail_pemesanan_id' => '',
            'user_id' => 2,
            'total_harga' => '1000000',
            'tanggal_pemesanan' => Carbon::now(),
            'status_pemesanan' => 'sedang dikirim',
        ]);
        Pemesanan::create([
            'detail_pemesanan_id' => '',
            'user_id' => 3,
            'total_harga' => '1000000',
            'tanggal_pemesanan' => Carbon::now(),
            'status_pemesanan' => 'sedang diproses',
        ]);
    }
}
