<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    use HasFactory;

    /**
     * Mendefinisikan nama tabel secara eksplisit agar sesuai dengan migrasi.
     */
    protected $table = 'users_profile';

    /**
     * Atribut yang dapat diisi secara massal.
     * Sesuai dengan skema tabel 'users_profile'.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'users_id',
        'alamat',
        'foto_profil',
    ];

    /**
     * Relasi "belongsTo" ke model User.
     * Profil ini 'milik' satu User.
     * Secara eksplisit mendefinisikan foreign key 'users_id'.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
