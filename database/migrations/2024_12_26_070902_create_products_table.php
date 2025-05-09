<?php

use App\Enums\StatusEnum;
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
            $table->integer('discount');
            $table->integer('stock_quantity'); // quantity available
            $table->unsignedBigInteger('category_id'); // Foreign key to categories
            $table->unsignedBigInteger('subcategory_id'); // Foreign key to subcategories
            $table->unsignedBigInteger('brand_id'); // Foreign key to brands
            $table->json('sizes')->nullable(); // Storing multiple size IDs
            $table->json('colors')->nullable(); // Storing multiple color IDs
            $table->string('thumbnail');
            $table->longText('images')->nullable(); // Optional product image
            $table->enum('status', array_column(StatusEnum::cases(), 'value'))->default(StatusEnum::INACTIVE->value);
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
