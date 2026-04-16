<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categories extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];
    protected $table = 'categories';

    public function books() : HasMany{
        return $this->hasMany(Book::class);
    }
}
