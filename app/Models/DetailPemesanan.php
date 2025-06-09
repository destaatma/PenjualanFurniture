<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    use HasFactory;

    protected $table = 'detail_pemesanans';
    protected $fillable = [
        'pemesanan_id',
        'produk_id',
        'jumlah_produk',
        'harga',
        'harga_subtotal',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }
}
