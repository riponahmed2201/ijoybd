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
                'discount' => 10,
                'stock_quantity' => 50,
                'category_id' => 1,
                'brand_id' => 1,
                'sizes' => json_encode([1,2]),
                'colors' => json_encode([1,2]),
                'thumbnail' => 'products/iphone14.png',
                'images' => 'products/iphone14.png',
            ],
            [
                'name' => 'Samsung Galaxy S23',
                'slug' => 'samsung-galaxy-s23',
                'description' => 'Flagship smartphone from Samsung.',
                'price' => 899.99,
                'discount' => 10,
                'stock_quantity' => 40,
                'category_id' => 1,
                'brand_id' => 2,
                'sizes' => json_encode([1,2]),
                'colors' => json_encode([1,2]),
                'thumbnail' => 'products/iphone14.png',
                'images' => 'products/samsung-galaxy-s23.png',
            ],
            [
                'name' => 'Nike Air Max 2024',
                'slug' => 'nike-air-max-2024',
                'description' => 'Comfortable running shoes.',
                'price' => 120.00,
                'discount' => 10,
                'stock_quantity' => 100,
                'category_id' => 2,
                'brand_id' => 3,
                'sizes' => json_encode([1,2]),
                'colors' => json_encode([1,2]),
                'thumbnail' => 'products/iphone14.png',
                'images' => 'products/nike-air-max-2024.png',
            ],
            [
                'name' => 'Adidas Ultraboost 22',
                'slug' => 'adidas-ultraboost-22',
                'description' => 'High-performance shoes for athletes.',
                'price' => 180.00,
                'discount' => 10,
                'stock_quantity' => 80,
                'category_id' => 2,
                'brand_id' => 4,
                'sizes' => json_encode([1,2]),
                'colors' => json_encode([1,2]),
                'thumbnail' => 'products/iphone14.png',
                'images' => 'products/adidas-ultraboost-22.png',
            ],
        ];

        Product::insert($products);
    }
}
