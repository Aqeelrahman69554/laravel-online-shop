<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SiteStatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statistic = [
            [
                'icon' => 'fa-solid fa-book',
                'title' => 'Total Koleksi',
                'value' => '1.500+',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'icon' => 'fa-solid fa-users',
                'title' => 'Pengguna Terdaftar',
                'value' => '2.500+',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'icon' => 'fa-solid fa-cart-shopping',
                'title' => 'Buku Terjual',
                'value' => '10k+',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'icon' => 'fa-solid fa-award',
                'title' => 'Penghargaan',
                'value' => '15',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        DB::table('site_statistic')->insert($statistic);
    }
}
