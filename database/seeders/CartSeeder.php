<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carts = [
            [
                'user_id' => 1, // Assume user 1 exists
                'product_id' => 1, // Assume product 1 exists
                'quantity' => 2,
                'price' => 999.99,
            ],
            [
                'user_id' => 1, // Assume user 1 exists
                'product_id' => 3, // Assume product 3 exists
                'quantity' => 1,
                'price' => 120.00,
            ],
            [
                'user_id' => 2, // Assume user 2 exists
                'product_id' => 2, // Assume product 2 exists
                'quantity' => 3,
                'price' => 899.99,
            ],
        ];

        Cart::insert($carts);
    }
}
