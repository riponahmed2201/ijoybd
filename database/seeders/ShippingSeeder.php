<?php

namespace Database\Seeders;

use App\Models\Shipping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shippings = [
            [
                'order_id' => 1, // Assume order 1 exists
                'shipping_address' => '123 Main Street, City, Country',
                'shipping_method' => 'standard',
                'shipping_status' => 'shipped',
                'shipped_at' => now(),
                'delivered_at' => null,
            ],
            [
                'order_id' => 2, // Assume order 2 exists
                'shipping_address' => '456 Oak Avenue, City, Country',
                'shipping_method' => 'express',
                'shipping_status' => 'delivered',
                'shipped_at' => now()->subDays(2),
                'delivered_at' => now()->subDays(1),
            ],
        ];

        Shipping::insert($shippings);
    }
}
