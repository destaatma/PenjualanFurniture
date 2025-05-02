<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    //

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
