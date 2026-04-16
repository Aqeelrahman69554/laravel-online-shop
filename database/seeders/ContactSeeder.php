<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [
                'name' => 'Jokowi Dodo',
                'email' => 'joko@gmail.com',
                'message' => 'Apakah toko ini mempunyai buku manajemen Perpustakaan?',
                'created_at' => Carbon::now()->subdays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'name' => 'Zaki Wahyudi',
                'email' => 'zaki@gmail.com',
                'message' => 'Buku Apa yang cocok bagi mahasiswa ilmu perpustakaan?',
                'created_at' => Carbon::now()->subDay(),
                'updated_at' => Carbon::now()->subDay(),
            ],
            [
                'name' => 'Doni Satria',
                'email' => 'doni@gmail.com',
                'message' => 'Buku yang paling best seller disini apa?',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        foreach($messages as $message){
            DB::table('contact')->insert($message);
        }
    }
}
