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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // order_id
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Foreign key to users (nullable for guest orders)
            $table->string('order_number')->unique(); // Unique order identifier
            $table->decimal('total_amount', 10, 2); // Total order amount
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled', 'failed'])->default('pending'); // Order status
            $table->text('shipping_address');
            $table->text('billing_address');
            $table->string('payment_method')->nullable(); // Payment method used
            $table->string('payment_status')->nullable(); // Payment status (e.g., successful, failed)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
