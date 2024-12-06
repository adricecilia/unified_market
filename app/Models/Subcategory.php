<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subcategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
