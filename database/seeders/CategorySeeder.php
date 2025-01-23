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
                'name' => 'T-Shirt',
                'slug' => 't-shirt',
                'description' => 'Devices, gadgets, and accessories.',
                'category_type' => 'both',
                'avatar' => null,
                'status' => 'active',
            ],
            [
                'name' => 'Short Pant',
                'slug' => 'short-pant',
                'description' => 'Clothing, shoes, and accessories.',
                'category_type' => 'men',
                'avatar' => null,
                'status' => 'active',
            ],
            [
                'name' => 'Trouser',
                'slug' => 'trouser',
                'description' => 'Smartphones and accessories.',
                'category_type' => 'men',
                'avatar' => null,
                'status' => 'active',
            ],
            [
                'name' => 'Joggers',
                'slug' => 'joggers',
                'description' => 'Laptops, notebooks, and accessories.',
                'category_type' => 'men',
                'avatar' => null,
                'status' => 'active',
            ],
            [
                'name' => 'Sendos',
                'slug' => 'sendos',
                'description' => 'Shirts, trousers, and more for men.',
                'category_type' => 'men',
                'avatar' => null,
                'status' => 'active',
            ],
            [
                'name' => 'Shoe',
                'slug' => 'shoe',
                'description' => 'Dresses, tops, and more for men.',
                'category_type' => 'both',
                'avatar' => null,
                'status' => 'active',
            ],
            [
                'name' => 'Megi',
                'slug' => 'megi',
                'description' => 'Dresses, tops, and more for men.',
                'category_type' => 'men',
                'avatar' => null,
                'status' => 'active',
            ],
            [
                'name' => 'Running Shoe',
                'slug' => 'running-shoe',
                'description' => 'Dresses, tops, and more for men.',
                'category_type' => 'both',
                'avatar' => null,
                'status' => 'active',
            ],
            [
                'name' => 'Bag',
                'slug' => 'bag',
                'description' => 'Dresses, tops, and more for men.',
                'category_type' => 'women',
                'avatar' => null,
                'status' => 'active',
            ],
            [
                'name' => 'Sunglass',
                'slug' => 'sunglass',
                'description' => 'Dresses, tops, and more for men.',
                'category_type' => 'men',
                'avatar' => null,
                'status' => 'active',
            ],
        ];

        Category::insert($categories);
    }
}
