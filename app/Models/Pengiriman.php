<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = 'pengirimans'; // Gunakan string, bukan array

    protected $fillable = [
        'pemesanan_id',
        'tanggal_pengiriman',
        'status_pengiriman',
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }
}
