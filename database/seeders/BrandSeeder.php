<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Apple',
                'slug' => 'apple',
                'description' => 'A leading brand in electronics and technology.',
                'logo' => 'logos/apple.png',
                'status' => 'active',
            ],
            [
                'name' => 'Samsung',
                'slug' => 'samsung',
                'description' => 'Innovative electronics and appliances.',
                'logo' => 'logos/samsung.png',
                'status' => 'active',
            ],
            [
                'name' => 'Nike',
                'slug' => 'nike',
                'description' => 'A global leader in sportswear and apparel.',
                'logo' => 'logos/nike.png',
                'status' => 'active',
            ],
            [
                'name' => 'Adidas',
                'slug' => 'adidas',
                'description' => 'Stylish sportswear and athletic shoes.',
                'logo' => 'logos/adidas.png',
                'status' => 'inactive',
            ],
        ];

        Brand::insert($brands);
    }
}
