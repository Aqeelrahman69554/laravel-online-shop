<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kosongkan tabel sebelum mengisi agar ID tetap konsisten
        DB::table('home')->truncate();

        DB::table('home')->insert([
            [
                'id' => 1,
                'home_title' => 'Temukan Buku Favoritmu di TOBUKEL',
                'home_image' => '',
                'created_at' => '2026-04-30 07:10:42',
                'updated_at' => '2026-04-30 07:25:38',
            ],
            [
                'id' => 2,
                'home_title' => 'Haloooo',
                'home_image' => 'images/home/xrC6stnkJnh0zaCpIKKqQ3i6RbhM5CjsRD3r2I0L.jpg',
                'created_at' => '2026-04-30 07:10:42',
                'updated_at' => '2026-04-30 07:25:38',
            ],
            [
                'id' => 3,
                'home_title' => 'Explore Our Collection of Bestsellers',
                'home_image' => 'images/home/YosEaOTw0HaaWESVeSznXME6lmU8K8FwjPiZKSVk.jpg',
                'created_at' => '2026-04-30 07:10:42',
                'updated_at' => '2026-04-30 07:39:14',
            ],
            [
                'id' => 4,
                'home_title' => 'Discover Your Next Great Chapter',
                'home_image' => 'images/home/hLJDqHwNuE1p0f9zic6vpxBK9Pf01N0q56S08UUM.png',
                'created_at' => '2026-04-30 07:10:42',
                'updated_at' => '2026-04-30 07:39:21',
            ],
        ]);
    }
}
