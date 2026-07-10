<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\SaleItem;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['invoice_no', 'customer_id', 'user_id', 'subtotal', 'discount', 'grandtotal', 'paymentmethod', 'amountpaid', 'notes'];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
