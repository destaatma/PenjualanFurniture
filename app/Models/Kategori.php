<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris'; // Gunakan string, bukan array

    protected $fillable = [
        'kategori',
        'deskripsi',
    ];
    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
