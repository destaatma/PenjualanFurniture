<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayarans'; // Gunakan string, bukan array

    protected $fillable = [
        'pemesanan_id',
        'snap_token',
        'jumlah_bayar',
        'tanggal_pembayaran',
        'status_pembayaran',
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }
}
