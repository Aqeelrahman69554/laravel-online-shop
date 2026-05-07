<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about')->insert([
            'title' => 'Tentang Kami',
            'description' => 'Kami adalah toko buku yang berdedikasi untuk menyediakan berbagai pilihan buku berkualitas kepada pelanggan kami. Dengan komitmen untuk mendukung literasi dan kecintaan terhadap membaca, kami berusaha untuk menjadi sumber utama bagi para pembaca di seluruh dunia.',
            'image' => 'https://example.com/images/about.jpg',
            'vision_title' => 'Visi Kami',
            'vision_description' => 'Menjadi toko buku terkemuka yang menginspirasi dan memberdayakan pembaca di seluruh dunia melalui koleksi buku yang beragam dan layanan pelanggan yang unggul.',
            'vision_icon' => 'https://example.com/icons/vision.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
