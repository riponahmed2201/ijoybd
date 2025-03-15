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
        'parent_id',
        'description',
        'status',
        'avatar'
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];

    // Parent category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Subcategories (Children)
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Relationship: A category has many subcategories
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
