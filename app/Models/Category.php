<?php

namespace App\Models;

use App\Enums\CategoryType;
use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'status',
        'type'
    ];

    protected $casts = [
        'status' => StatusEnum::class,
        'type' => CategoryType::class,
    ];

    // Relationship: A category has many subcategories
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
