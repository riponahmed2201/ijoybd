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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id(); // shipping_id
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Foreign key to orders
            $table->string('shipping_address'); // Shipping address
            $table->string('shipping_method'); // Shipping method (e.g., standard, express)
            $table->enum('shipping_status', ['pending', 'shipped', 'delivered', 'failed'])->default('pending'); // Shipping status
            $table->timestamp('shipped_at')->nullable(); // Shipping date
            $table->timestamp('delivered_at')->nullable(); // Delivery date
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippings');
    }
};
