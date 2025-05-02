<?php

namespace Database\Seeders;

use App\Models\DetailPemesanan;
use App\Models\Kategori;
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
            DetailPemesananSeeder::class,
            PemesananSeeder::class,
            PembayaranSeeder::class,
        ]);
    }
}
