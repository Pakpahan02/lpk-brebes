<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'image',
        'visible',
    ];

    protected $casts = [
        'visible' => 'boolean',
    ];

    public function training_category(): BelongsTo
    {
        return $this->belongsTo(TrainingCategory::class, 'category_id');
    }
}
