<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'avatar',
        'status',
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];
}
