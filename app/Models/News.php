<?php

namespace App\Models;

use App\Enums\NewsCategoryEnums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category',
        'title',
        'description',
        'image',
        'visible',
    ];

    protected $casts = [
        'category' => NewsCategoryEnums::class,
    ];
}
