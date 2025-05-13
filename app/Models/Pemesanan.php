<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanans'; // Gunakan string, bukan array

    protected $fillable = [
        'detail_pemesanan_id',
        'user_id',
        'total_harga',
        'tanggal_pemesanan',
        'status_pemesanan',
    ];

    public function detail_pemesanan()
    {
        return $this->belongsTo(DetailPemesanan::class);
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
