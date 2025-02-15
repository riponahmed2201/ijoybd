<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            BrandSeeder::class,
            ProductColorSeeder::class,
            ProductSizeSeeder::class,
            ProductSeeder::class,
            CartSeeder::class,
            OrderSeeder::class,
            PaymentSeeder::class,
            ShippingSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
