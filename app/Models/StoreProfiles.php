<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'address',
        'email',
        'phone',
        'google_maps_embed_code',
    ];
}
