<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $table = 'product_sizes';

    protected $fillable = [
        'name',
        'status',
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];
}
