<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $table = 'orders';
    // Mengizinkan kolom untuk diisi secara massal
    protected $fillable = [
        'user_id',
        'order_date',
        'total_price',
        'status',
    ];

    /**
     * Relasi ke User: Siapa yang melakukan pemesanan ini?
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
