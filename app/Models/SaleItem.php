<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    protected $fillable = ['sale_id', 'product_id', 'quantity', 'sellingprice', 'subtotal'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
