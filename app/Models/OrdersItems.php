<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    // Karena nama migrasi Anda 'orders_items' (jamak),
    // Laravel otomatis mencari tabel 'orders_items'.
    // Jadi Anda tidak perlu menulis protected $table.

    protected $table = 'orders_items';
    protected $fillable = [
        'order_id',
        'book_id',
        'quantity',
        'price',
    ];

    /**
     * Relasi ke Order: Item ini bagian dari pesanan mana?
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relasi ke Book: Item ini merujuk ke buku yang mana?
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
