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
            'pemesanan_id' => 1,
            'token' => '12346754334563213',
            'jumlah_bayar' => '1000000',
            'tanggal_pembayaran' => Carbon::now(),
            'status_pembayaran' => 'gagal',
        ]);
        Pembayaran::create([
            'pemesanan_id' => 2,
            'token' => '12345466432124',
            'jumlah_bayar' => '2000000',
            'tanggal_pembayaran' => Carbon::now(),
            'status_pembayaran' => 'selesai',
        ]);
        Pembayaran::create([
            'pemesanan_id' => 3,
            'token' => '123423454321234',
            'jumlah_bayar' => '1000000',
            'tanggal_pembayaran' => Carbon::now(),
            'status_pembayaran' => 'gagal',
        ]);
    }
}
