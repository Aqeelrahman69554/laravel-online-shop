<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimoni = [
            [
                'testimoni_desc' => 'Koleksi bukunya lengkap sekali, terutama bagian Ilmu Perpustakaan. Sangat membantu tugas kuliah saya.',
                'testimoni_image'=> 'tes1.png',
                'testimoni_name'=> 'Ahmad Fauzi',
                'testimoni_status'=> 'Mahasiswa Ilmu Perpustakaan',
                'rating'=> 5,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'testimoni_desc' => 'Pengirimannya cepat dan bukunya dibungkus sangat rapi. Terima kasih banyak!',
                'testimoni_image' => 'tes2.png',
                'testimoni_name' => 'Siti Aminah',
                'testimoni_status' => 'Dosen Ilmu Perpustakaan',
                'rating' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'testimoni_desc' => 'Pilihan novelnya selalu up-to-date. Sangat puas dengan layanan kurasi buku di sini.',
                'testimoni_image' => 'tes3.png',
                'testimoni_name' => 'Budi Santoso',
                'testimoni_status' => 'Penulis & Editor',
                'rating' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        DB::table('testimoni')->insert($testimoni);
    }
}
