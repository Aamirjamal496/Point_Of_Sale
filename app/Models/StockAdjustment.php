<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockAdjustment extends Model
{
    protected $fillable = ['product_id', 'adjustment_type', 'quantity', 'reason', 'notes', 'role'];
}
