<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TransactionSeeder::class,
            CategoriesSeeder::class,
            BookSeeder::class,
            OrdersSeeder::class,
            OrdersItemsSeeder::class,
            // CartSeeder::class,
            HomeSeeder::class,
            ContactSeeder::class,
            StoreProfilesSeeder::class,
            FooterSeeder::class,
            SiteStatisticSeeder::class,
            TestimoniSeeder::class,
            ServiceSeeder::class,
            Service2Seeder::class,
            AboutSeeder::class,
            BannerSeeder::class,
            AboutFeatureSeeder::class,
        ]);
    }
}
