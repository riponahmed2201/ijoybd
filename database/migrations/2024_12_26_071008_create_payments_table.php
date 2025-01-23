<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // payment_id
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Foreign key to orders
            $table->decimal('amount', 10, 2); // Amount paid
            $table->enum('payment_method', ['credit_card', 'paypal', 'bank_transfer', 'cash_on_delivery']); // Payment method
            $table->string('payment_status')->default('pending'); // Payment status (e.g., successful, failed, pending)
            $table->string('transaction_id')->nullable(); // Transaction ID from the payment provider
            $table->timestamp('payment_date')->nullable(); // Payment date
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
