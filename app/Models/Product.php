<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    function Categories()
    {
        return $this->belongsTo(Category::class);
    }
}
