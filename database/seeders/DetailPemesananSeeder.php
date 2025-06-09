<?php

namespace Database\Seeders;

use App\Models\DetailPemesanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailPemesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailPemesanan::create([
            'pemesanan_id' => 1,
            'produk_id' => 1,
            'jumlah_produk' => '2',
            'harga' => '1000000',
            'harga_subtotal' => '2000000',
        ]);
    }
}
