<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    protected $table = 'product_colors';

    protected $fillable = [
        'name',
        'status',
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];
}
