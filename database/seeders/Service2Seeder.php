<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Service2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('service2')->insert([
            [
                'icon' => 'fa-solid fa-book',
                'title' => 'Total Koleksi',
                'value' => '1.500+',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fa-solid fa-users',
                'title' => 'Pengguna Terdaftar',
                'value' => '2.500+',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fa-solid fa-cart-shopping',
                'title' => 'Buku Terjual',
                'value' => '10k+',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fa-solid fa-award',
                'title' => 'Penghargaan',
                'value' => '10+',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
