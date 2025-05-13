<?php

namespace Database\Seeders;

use App\Models\Ulasan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UlasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ulasan::create([
            'produk_id' => 1,
            'user_id' => 1,
            'rating' => 5,
            'ulasan' => 'Produk sangat bagus dan berkualitas!',
        ]);
        Ulasan::create([
            'produk_id' => 2,
            'user_id' => 2,
            'rating' => 4,
            'ulasan' => 'Produk sangat bagus dan keren!',
        ]);
        Ulasan::create([
            'produk_id' => 3,
            'user_id' => 3,
            'rating' => 5,
            'ulasan' => 'Produk sangat bagus dan mantap!',
        ]);
    }
}
