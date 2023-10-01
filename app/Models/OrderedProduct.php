<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class OrderedProduct extends Model
{
    use HasFactory;
    protected $table = 'ordered_product';
    protected $fillable = [
        'product_name',
        'order_id',
        'price'
    ];
    public function order()
    {
       return $this->belongsTo(Order::class);
    }
}
