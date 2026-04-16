<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $service = [
            [
                'icon' => 'fa-solid fa-user',
                'service_name' => 'Pengiriman Aman',
                'service_desc' => 'Gratis ongkir untuk pesanan di atas Rp300.000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'icon' => 'fa-solid fa-shield-halved',
                'service_name' => 'Pembayaran Aman',
                'service_desc' => 'Gratis ongkir untuk pesanan di atas Rp300.000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        DB::table('service')->insert($service);
    }
}
