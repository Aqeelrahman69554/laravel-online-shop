<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('store_profiles')->insert([
            'address' => 'Jl. Marsda Adisucipto No. 1, Yogyakarta',
            'email' => 'tokobuku@gmail.com',
            'phone' => '08382928233',
            'google_maps_embed_code' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1..." width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
