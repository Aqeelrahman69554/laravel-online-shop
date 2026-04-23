<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $orders = [
            [
                'user_id' => $user ? $user->id : 1,
                'order_date' => Carbon::now()->subDays(2),
                'total_price' => 15000,
                'status' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => $user ? $user->id : 1,
                'order_date' => Carbon::now()->subDays(6),
                'total_price' => 15000,
                'status' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];
        foreach ($orders as $order) {
            DB::table('orders')->insert($order);
        }
    }
}
