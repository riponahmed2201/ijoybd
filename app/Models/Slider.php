<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'status',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];
}
