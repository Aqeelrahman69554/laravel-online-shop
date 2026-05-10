<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutFeature extends Model
{
    protected $table = 'about_feature';

    protected $fillable = [
        'icon',
        'sub_feature',
        'desc_feature',
    ];
}
