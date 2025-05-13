<?php

namespace Database\Seeders;

use App\Models\Pengiriman;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengirimanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengiriman::create([
            'pemesanan_id' => 1,
            'tanggal_pengiriman' => Carbon::now(),
            'status_pengiriman' => 'menunggu kurir',
        ]);
        Pengiriman::create([
            'pemesanan_id' => 2,
            'tanggal_pengiriman' => Carbon::now(),
            'status_pengiriman' => 'sedang dalam perjalanan',
        ]);
    }
}
