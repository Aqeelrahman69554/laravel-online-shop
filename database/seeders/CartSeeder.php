<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Book;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $book1 = Book::where('books_name', 'Pengantar Ilmu Perpustakaan')->first();
        $book2 = Book::where('books_name', 'Bumi')->first();
        $cartsItems = [
            [
                'user_id' => $user ? $user->id : 1,
                'book_id' => $book1 ? $book1->id : 1,
                'quantity' => 2,
            ],
            [
                'user_id' => $user ? $user->id : 1,
                'book_id' => $book1 ? $book1->id : 1,
                'quantity' => 4,
            ],
            [
                'user_id' => $user ? $user->id : 1,
                'book_id' => $book2 ? $book2->id : 1,
                'quantity' => 3,
            ],
        ];

        foreach ($cartsItems as $item) {
            DB::table('cart')->insert([
                'user_id'    => $item['user_id'],
                'book_id'    => $item['book_id'],
                'quantity'   => $item['quantity'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
