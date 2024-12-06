<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'brand_id',
        'packaging',
        'thumbnail',
        'unit_price',
        'bulk_price',
        'tax_percentage',
        'previous_unit_price',
        'reference_format',
    ];
}
