<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Men',
                'slug' => 'men',
                'description' => 'T-Shirt, Sunglass etc',
                'status' => 'active',
            ],
            [
                'name' => 'Women',
                'slug' => 'women',
                'description' => 'Clothing, shoes, and accessories.',
                'status' => 'active',
            ]
        ];

        Category::insert($categories);
    }
}
