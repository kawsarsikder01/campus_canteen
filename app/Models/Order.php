<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderedProduct;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'name','email',
        'phone','amount',
        'address','status',
        'transaction_id',
        'currency'
    ];
    
    public function orderProducts()
    {
        return $this->hasMany(OrderedProduct::class);
    }
}
