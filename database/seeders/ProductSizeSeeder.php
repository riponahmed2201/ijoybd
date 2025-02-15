<?php

namespace Database\Seeders;

use App\Models\ProductSize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productSizes = [
            [
                'name' => 'S',
                'status' => 'active'
            ],
            [
                'name' => 'M',
                'status' => 'active'
            ],
            [
                'name' => 'L',
                'status' => 'active'
            ],
            [
                'name' => 'XL',
                'status' => 'active'
            ],
            [
                'name' => 'XXL',
                'status' => 'active'
            ],
            [
                'name' => 'XXXL',
                'status' => 'active'
            ]
        ];

        ProductSize::insert($productSizes);
    }
}
