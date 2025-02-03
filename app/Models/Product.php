<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'stock_quantity',
        'category_id',
        'brand_id',
        'size',
        'color',
        'thumbnail',
        'images',
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Relationship with the Review model
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Calculate the average rating for the product
    public function averageRating()
    {
        return $this->reviews()->avg('rating');
    }
}
