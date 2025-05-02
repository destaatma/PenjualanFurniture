<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'kategori' => 'kursi tamu',
            'deskripsi' => 'satu set kursi tamu terbuat dari bahan kayu jati ',
        ]);

        Kategori::create([
            'kategori' => 'meja',
            'deskripsi' => 'meja terbuat dari bahan kayu jati pilihan ',
        ]);

        Kategori::create([
            'kategori' => 'almari',
            'deskripsi' => 'almari terbuat dari bahan kayu jati pilihan ',
        ]);
    }
}
