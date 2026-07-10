<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class InventoryTransaction extends Model
{
    protected $table = 'inventorytransactions';
    protected $fillable = ['product_id', 'type', 'quantity', 'stock_before', 'stock_after', 'reference_type'];
    function Product()
    {
        return $this->belongsTo(Product::class);
    }
    function user()
    {
        return $this->belongsTo(User::class);
    }
}
