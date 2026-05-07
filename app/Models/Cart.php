<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    // Mengizinkan mass assignment untuk kolom yang ada di migrasi
    protected $table = 'cart';

    protected $fillable = [
        'user_id',
        'book_id',
        'quantity',
    ];

    /**
     * Relasi ke User: Keranjang ini milik siapa?
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Book: Keranjang ini berisi buku apa?
     */
    public function book(): BelongsTo
    {
        // Pastikan foreign key-nya adalah 'book_id'
        return $this->belongsTo(Book::class, 'book_id');
    }
}
