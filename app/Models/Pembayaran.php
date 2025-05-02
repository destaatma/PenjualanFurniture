<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayarans'; // Gunakan string, bukan array

    protected $fillable = [
        'detail_pemesanan_id',
        'user_id',
        'total_harga',
        'tanggal-pemesanan',
        'status_pemesanan',
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }
}
