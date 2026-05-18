<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('banner')->insert([
            'image' => 'banner.jpg',
            'title' => 'Diskon Buku Terbaik',
            'sub_title' => 'Temukan Bacaan Favoritmu',
            'description' => 'Nikmati koleksi buku terbaik mulai dari novel, edukasi, hingga komik dengan harga spesial hanya di TOBUKEL.',
            'discount' => '50%',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
