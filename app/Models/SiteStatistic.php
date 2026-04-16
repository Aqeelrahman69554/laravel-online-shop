<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteStatistic extends Model
{
    /**
     * Karena nama tabel Anda adalah 'site_statistic' (singular),
     * kita harus mendefinisikannya agar Laravel tidak mencari 'site_statistics'.
     */
    protected $table = 'site_statistic';

    /**
     * Daftar kolom yang diizinkan untuk diisi massal.
     */
    protected $fillable = [
        'icon',
        'title',
        'value',
    ];
}
