<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';
    protected $fillable = [
        'kategori_id',
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function ulasans()
    {
        return $this->hasMany(Ulasan::class);
    }
    public function detailPemesanans()
    {
        return $this->hasMany(DetailPemesanan::class);
    }
    public function ulasanSudahDibuatOleh(int $userId): bool
    {
        return $this->ulasans()->where('user_id', $userId)->exists();
    }
}
