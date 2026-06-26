<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Supplier extends Model
{
    protected $fillable = ['supplier_name', 'contact_person', 'phone', 'email', 'address'];
    function Products()
    {
        return $this->hasMany(Product::class);
    }
}
