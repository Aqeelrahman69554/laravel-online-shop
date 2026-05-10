<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about')->insert([
            'image' => 'about.jpg',
            'title' => 'Tentang TOBUKEL',
            'description' => 'TOBUKEL adalah toko buku online yang menyediakan berbagai koleksi buku berkualitas, mulai dari pendidikan, perpustakaan, teknologi, agama, hingga novel. Kami hadir untuk memudahkan pembaca menemukan buku favorit dengan pengalaman belanja yang nyaman dan terpercaya.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
