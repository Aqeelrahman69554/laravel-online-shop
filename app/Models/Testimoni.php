<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'testimoni';

    protected $fillable = [
        'testimoni_desc',
        'testimoni_image',
        'testimoni_name',
        'testimoni_status',
        'rating',
    ];
}
