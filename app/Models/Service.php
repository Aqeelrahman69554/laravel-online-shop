<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * Karena nama tabel Anda adalah 'service' (singular),
     * kita harus mendefinisikannya secara manual.
     */
    protected $table = 'service';

    /**
     * Daftar kolom yang diizinkan untuk diisi massal.
     */
    protected $fillable = [
        'icon',
        'service_name',
        'service_desc',
    ];
}
