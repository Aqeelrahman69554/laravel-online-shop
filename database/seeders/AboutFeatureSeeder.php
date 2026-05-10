<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about_feature')->insert([
            'icon' => 'fa fa-book-open',
            'sub_feature'=>'Koleksi Buku Lengkap',
            'desc_feature'=> 'Temukan berbagai pilihan buku untuk belajar, riset, hiburan, dan pengembangan diri.',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
