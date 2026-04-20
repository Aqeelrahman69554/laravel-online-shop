<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = [
        'category_id',
        'books_images',
        'books_author',
        'books_name',
        'books_desc',
        'price',
        'stock',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }
}
