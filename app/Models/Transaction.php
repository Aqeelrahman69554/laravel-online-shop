<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Mass Assignment: Kolom yang boleh diisi manual
    protected $fillable = [
        'user_id',
        'invoice_number',
        'total_price',
        'status',
        'payment_method'
    ];

    /**
     * Relasi: Satu transaksi dimiliki oleh satu User (Pelanggan)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
