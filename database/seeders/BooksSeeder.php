<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use Carbon\Carbon;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Categories::inRandomOrder()->first();

        $ilmuperpustakaan = Categories::where('name', 'Ilmu Perpustakaan')->first();
        $novel = Categories::where('name', 'Novel')->first();
        $sejarah = Categories::where('name','Sejarah')->first();
        $sainsteknologi = Categories::where('name','Sains & Teknologi')->first();
        $books = [
            [
                'category_id'  => $ilmuperpustakaan ? $ilmuperpustakaan->id : 1,
                'books_images' => 'buku1.png',
                'books_author' => 'Sulistyo Basuki',
                'books_name'   => 'Pengantar Ilmu Perpustakaan',
                'books_desc'   => 'buku pengantar Ilmu perpustakaan bagi mahasiswa ilmu perpustakaan',
                'price'        => 75000.00,
                'stock'        => 15,
            ],
            [
                'category_id'  => $ilmuperpustakaan ? $ilmuperpustakaan->id : 1,
                'books_images' => 'buku2.png',
                'books_author' => 'Ahmad Subarjo',
                'books_name'   => 'Sumber Rujukan Informasi',
                'books_desc'   => 'buku pengantar Sumber Rujukan Informasi bagi mahasiswa ilmu perpustakaan',
                'price'        => 40000.00,
                'stock'        => 13,
            ],
            [
                'category_id'  => $novel ? $novel->id : 2,
                'books_images' => 'buku3.png',
                'books_author' => 'Tere Liye',
                'books_name'   => 'Bumi',
                'books_desc'   => 'buku Novel Tere Liye',
                'price'        => 45000.00,
                'stock'        => 13,
            ],
            [
                'category_id'  => $sejarah ? $sejarah->id : 4,
                'books_images' => 'buku4.png',
                'books_author' => 'Tan Malaka',
                'books_name'   => 'Madilog',
                'books_desc'   => 'Sejarah Yang hampir hilang',
                'price'        => 41000.00,
                'stock'        => 19,
            ],
            [
                'category_id'  => $sainsteknologi ? $sainsteknologi->id : 3,
                'books_images' => 'buku3.png',
                'books_author' => 'Tere Liye',
                'books_name'   => 'Bumi',
                'books_desc'   => 'buku Novel Tere Liye',
                'price'        => 45000.00,
                'stock'        => 13,
            ],
        ];

        foreach ($books as $book) {
            DB::table('books')->insert([
                'category_id'  => $book['category_id'],
                'books_images' => $book['books_images'],
                'books_author' => $book['books_author'],
                'books_name'   => $book['books_name'],
                'books_desc'   => $book['books_desc'],
                'price'        => $book['price'],
                'stock'        => $book['stock'],
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ]);
        }
    }
}
