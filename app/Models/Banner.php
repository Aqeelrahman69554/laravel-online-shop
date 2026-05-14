<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';

    protected $fillable = [
        'image',
        'title',
        'sub_title',
        'description',
        'discount',
    ];
}
