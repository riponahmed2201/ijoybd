<?php

namespace App\Models;

use App\Enums\CategoryType;
use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_type',
        'avatar',
        'status',
    ];

    protected $casts = [
        'category_type' => CategoryType::class,
        'status' => StatusEnum::class,
    ];
}
