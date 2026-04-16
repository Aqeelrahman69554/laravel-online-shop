<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Order;
// use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class OrdersItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = Order::first();
        $book = Book::first();

        // Pastikan datanya ketemu
        if ($order && $book) {
            DB::table('orders_items')->insert([
                'order_id'   => $order->id, // Mengambil ID yang benar-benar ada
                'book_id'    => $book->id,
                'quantity'   => 2,
                'price'      => 23000,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            $this->command->error('Data Order atau Book tidak ditemukan, gagal seeding!');
        }
    }
}
