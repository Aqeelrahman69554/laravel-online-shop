<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Str;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    // Relasi ke tabel Books
    public function books()
    {
        return $this->hasMany(Book::class, 'category_id');
    }
}
