<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    /**
     * Karena nama tabel adalah 'testimoni' (singular),
     * definisikan tabelnya agar Laravel tidak mencari 'testimonies'.
     */
    protected $table = 'testimoni';

    /**
     * Daftar kolom yang diizinkan untuk diisi massal.
     */
    protected $fillable = [
        'testimoni_desc',
        'testimoni_image',
        'testimoni_name',
        'testimoni_status',
        'rating',
    ];
}
