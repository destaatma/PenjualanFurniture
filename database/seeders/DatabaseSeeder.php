<?php

namespace Database\Seeders;

use App\Models\DetailPemesanan;
use App\Models\Kategori;
use App\Models\Pemesanan;
use App\Models\Pengiriman;
use App\Models\Ulasan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            KategoriSeeder::class,
            ProdukSeeder::class,
            PemesananSeeder::class,
            DetailPemesananSeeder::class,
            PembayaranSeeder::class,
            PengirimanSeeder::class,
            UlasanSeeder::class,
        ]);
    }
}
