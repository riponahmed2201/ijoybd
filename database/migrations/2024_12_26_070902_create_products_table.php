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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // product_id
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2); // price in decimal format
            $table->integer('stock_quantity'); // quantity available
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Foreign key to categories
            $table->foreignId('brand_id')->constrained()->onDelete('cascade'); // Foreign key to brands
            $table->string('image')->nullable(); // Optional product image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
