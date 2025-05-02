<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::create([
            'kategori_id' => 1,
            'nama' => 'almari',
            'deskripsi' => 'almari dengan bahan berkualitas',
            'harga' => '1000000',
            'gambar' => '',
        ]);
    }
}
