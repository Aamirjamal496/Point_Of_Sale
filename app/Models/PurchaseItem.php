<?php

namespace App\Models;

use App\Models\Purchase;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    protected $fillable = ['purchase_id', 'product_id', 'quantity', 'cost_price', 'subtotal'];
    function Purchases()
    {
        return $this->belongsTo(Purchase::class);
    }
    function Products()
    {
        return $this->belongsTo(Product::class);
    }
}
