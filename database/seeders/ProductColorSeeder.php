<?php

namespace Database\Seeders;

use App\Models\ProductColor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productColors = [
            [
                'name' => 'white',
                'code' => '#111111',
                'status' => 'active'
            ],
            [
                'name' => 'black',
                'code' => '#000000',
                'status' => 'active'
            ]
        ];

        ProductColor::insert($productColors);
    }
}
