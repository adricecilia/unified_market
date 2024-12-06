<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategorySubcategory extends Model
{
    protected $fillable = [
        'category_id',
        'subcategory_id',
    ];
}
