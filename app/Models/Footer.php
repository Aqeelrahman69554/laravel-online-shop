<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    /**
     * Karena tabel Anda bernama 'footer', Laravel akan mencari
     * tabel bernama 'footers'. Jika tabel Anda tetap 'footer',
     * gunakan baris di bawah ini:
     */
    protected $table = 'footer';

    protected $fillable = [
        'question',
        'answer',
        'instagram',
        'facebook',
        'youtube',
        'twitter',
    ];
}
