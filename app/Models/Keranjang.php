<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $fillable = [
        'produk_id',
        'jumlah',
        'user_id', // Jika Anda menggunakan autentikasi
    ];
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
