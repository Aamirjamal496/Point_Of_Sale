<?php

namespace App\Models;

use App\Models\Sale;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // protected $table = 'customers';
    protected $fillable = ['name', 'phone', 'email', 'address', 'status'];
    public function Sale()
    {
        return $this->hasMany(Sale::class);
    }
}
