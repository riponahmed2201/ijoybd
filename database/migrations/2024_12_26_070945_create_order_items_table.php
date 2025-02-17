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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // order_item_id
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Foreign key to orders
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Foreign key to products
            $table->integer('quantity');
            $table->decimal('price', 10, 2); // Price of the product at the time of the order
            $table->decimal('total', 10, 2); // Total price for the product (quantity * price)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
