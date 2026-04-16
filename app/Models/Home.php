<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    // Memberitahu Laravel bahwa tabel yang digunakan adalah 'home'
    protected $table = 'home';

    // Mengizinkan kolom ini untuk diisi massal
    protected $fillable = [
        'home_title',
        'home_image',
    ];
}
