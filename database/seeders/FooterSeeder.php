<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('footer')->insert([
            'question' => 'Mengapa Pembaca Memilih Kami?',
            'answer' => 'Kami percaya bahwa setiap buku memiliki perjalanan. Dengan kurasi yang teliti oleh tim pustakawan kami, kami memastikan hanya karya-karya terbaik dan bermakna yang sampai ke tangan Anda. Kami hadir bukan hanya untuk menjual buku, tetapi untuk menjadi rekan dalam perjalanan literasi Anda.',
            'instagram' => 'https://www.instagram.com/axeell517/',
            'facebook' => 'https://www.facebook.com/tokobukuyogya/',
            'youtube' => 'https://www.youtube.com/channel/UCniBOF3M9zbX6QphIJQALSQ',
            'twitter' => 'https://x.com/gramediadotcom',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
