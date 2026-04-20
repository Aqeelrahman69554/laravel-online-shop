<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Str;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan ada user dengan role customer
        $customer = User::where('role', 'customer')->first();

        if ($customer) {
            Transaction::create([
                'user_id' => $customer->id,
                'invoice_number' => 'INV-' . strtoupper(Str::random(6)),
                'total_price' => 150000,
                'status' => 'completed',
                'payment_method' => 'Transfer Bank',
                'created_at' => now(),
            ]);

            Transaction::create([
                'user_id' => $customer->id,
                'invoice_number' => 'INV-' . strtoupper(Str::random(6)),
                'total_price' => 75000,
                'status' => 'pending',
                'payment_method' => 'E-Wallet',
                'created_at' => now()->subDay(),
            ]);
        }
    }
}
