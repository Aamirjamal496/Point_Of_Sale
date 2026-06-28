<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['supplier_name', 'contact_person', 'phone', 'email', 'address'];
    function Products()
    {
        return $this->hasMany(Product::class);
    }
    function Purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
