<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_name',
        'cost_price',
        'sell_price',
        'description',
        'image','esale'
    ];
    public function category()
    {
        return $this->belongsToMany(Categorie::class,'category_product');
    }
}
