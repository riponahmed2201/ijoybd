<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategories';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'avatar',
        'status',
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];

    // Relationship: A subcategory belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
