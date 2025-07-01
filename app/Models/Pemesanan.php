<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanans'; // Gunakan string, bukan array

    protected $fillable = [
        'user_id',
        'total_harga',
        'tanggal_pemesanan',
        'status_pemesanan',
    ];

    public function detailPemesanan()
    {
        return $this->hasMany(DetailPemesanan::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
