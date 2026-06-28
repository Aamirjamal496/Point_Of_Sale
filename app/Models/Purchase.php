<?php

namespace App\Models;

use App\Models\Supplier;
use App\Models\PurchaseItem;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['supplier_id', 'purchase_date', 'total'];
    function Suppliers()
    {
        return $this->belongsTo(Supplier::class);
    }
    function PurchaseItems()
    {
        return $this->hasMany(PurchaseItem::class);
    }
}
