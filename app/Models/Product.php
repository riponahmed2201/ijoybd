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
        'subcategory_id',
        'brand_id',
        'sizes',
        'colors',
        'thumbnail',
        'images',
        'status',
    ];

    protected $casts = [
        'status' => StatusEnum::class,
        'sizes' => 'array',  // Laravel will automatically decode JSON
        'colors' => 'array',
    ];

    public function getSizeDetailsAttribute()
    {
        if (!empty($this->colors)) {
            return ProductSize::whereIn('id', $this->sizes)->get();
        }

        return [];
    }

    public function getColorDetailsAttribute()
    {
        if (!empty($this->colors)) {
            return ProductColor::whereIn('id', $this->colors)->get();
        }

        return [];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
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
