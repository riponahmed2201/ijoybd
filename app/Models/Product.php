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
        'discount',
        'stock_quantity',
        'category_id',
        'brand_id',
        'size',
        'color',
        'thumbnail',
        'images',
        'status',
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    public function size()
    {
        return $this->hasMany(ProductSize::class, 'id', 'size_id');
    }

    public function color()
    {
        return $this->hasMany(ProductColor::class, 'id', 'colro_id');
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
