<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service2 extends Model
{
    protected $table = 'service2';

    protected $fillable = [
        'icon',
        'title',
        'value',
    ];
}
