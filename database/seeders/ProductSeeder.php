<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'iPhone 14',
                'slug' => 'iphone-14',
                'description' => 'Latest iPhone with great features.',
                'price' => 999.99,
                'stock_quantity' => 50,
                'category_id' => 1, // Electronics category
                'brand_id' => 1, // Apple brand
                'image' => 'products/iphone14.png',
            ],
            [
                'name' => 'Samsung Galaxy S23',
                'slug' => 'samsung-galaxy-s23',
                'description' => 'Flagship smartphone from Samsung.',
                'price' => 899.99,
                'stock_quantity' => 40,
                'category_id' => 1, // Electronics category
                'brand_id' => 2, // Samsung brand
                'image' => 'products/samsung-galaxy-s23.png',
            ],
            [
                'name' => 'Nike Air Max 2024',
                'slug' => 'nike-air-max-2024',
                'description' => 'Comfortable running shoes.',
                'price' => 120.00,
                'stock_quantity' => 100,
                'category_id' => 2, // Fashion category
                'brand_id' => 3, // Nike brand
                'image' => 'products/nike-air-max-2024.png',
            ],
            [
                'name' => 'Adidas Ultraboost 22',
                'slug' => 'adidas-ultraboost-22',
                'description' => 'High-performance shoes for athletes.',
                'price' => 180.00,
                'stock_quantity' => 80,
                'category_id' => 2, // Fashion category
                'brand_id' => 4, // Adidas brand
                'image' => 'products/adidas-ultraboost-22.png',
            ],
        ];

        Product::insert($products);
    }
}
