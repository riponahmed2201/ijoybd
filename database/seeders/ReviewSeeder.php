<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            [
                'user_id' => 1, // Assume user 1 exists
                'product_id' => 1, // Assume product 1 exists
                'rating' => 5,
                'review' => 'Amazing product! It exceeded my expectations. Highly recommend.',
            ],
            [
                'user_id' => 2, // Assume user 2 exists
                'product_id' => 2, // Assume product 2 exists
                'rating' => 4,
                'review' => 'Great product but the delivery was delayed by a couple of days.',
            ],
            [
                'user_id' => 3, // Assume user 3 exists
                'product_id' => 1, // Assume product 1 exists
                'rating' => 3,
                'review' => 'Good quality, but I expected more features at this price.',
            ],
        ];

        Review::insert($reviews);
    }
}
