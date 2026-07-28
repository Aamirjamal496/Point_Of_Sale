<?php

namespace App\Models;

use App\Models\Category;
use App\Models\InventoryTransaction;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;

class Product extends Model
{
    protected $fillable = ['product_name', 'category_id', 'supplier_id', 'sku', 'min_stock', 'stock', 'purchase_price', 'selling_price', 'product_image'];
    function category()
    {
        return $this->belongsTo(Category::class);
    }
    function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    function Transactions()
    {
        return $this->hasMany(InventoryTransaction::class);
    }
}
