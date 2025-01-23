<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payments = [
            [
                'order_id' => 1, // Assume order 1 exists
                'amount' => 1199.99,
                'payment_method' => 'credit_card',
                'payment_status' => 'pending',
                'transaction_id' => null,
                'payment_date' => null,
            ],
            [
                'order_id' => 2, // Assume order 2 exists
                'amount' => 899.99,
                'payment_method' => 'paypal',
                'payment_status' => 'successful',
                'transaction_id' => 'TRX123456789',
                'payment_date' => now(),
            ],
        ];

        Payment::insert($payments);
    }
}
