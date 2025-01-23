<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            [
                'user_id' => 1, // Assume user 1 exists
                'order_number' => 'ORD12345',
                'total_amount' => 1199.99,
                'status' => 'pending',
                'shipping_address' => '123 Main St, City, Country',
                'billing_address' => '123 Main St, City, Country',
                'payment_method' => 'credit_card',
                'payment_status' => 'pending',
            ],
            [
                'user_id' => 2, // Assume user 2 exists
                'order_number' => 'ORD12346',
                'total_amount' => 899.99,
                'status' => 'processing',
                'shipping_address' => '456 Side Rd, Town, Country',
                'billing_address' => '456 Side Rd, Town, Country',
                'payment_method' => 'paypal',
                'payment_status' => 'successful',
            ],
        ];

        foreach ($orders as $order) {
            $newOrder = Order::create($order);

            // Add order items for each order
            $orderItems = [
                [
                    'order_id' => $newOrder->id,
                    'product_id' => 1, // Assume product 1 exists
                    'quantity' => 2,
                    'price' => 999.99,
                    'total' => 1999.98,
                ],
                [
                    'order_id' => $newOrder->id,
                    'product_id' => 3, // Assume product 3 exists
                    'quantity' => 1,
                    'price' => 120.00,
                    'total' => 120.00,
                ]
            ];

            foreach ($orderItems as $item) {
                OrderItem::create($item);
            }
        }
    }
}
