<?php 
namespace App\Repository;

use App\Interface\RepositorInterface;
use App\Models\Product;

class ProductRepository implements RepositorInterface{
    public function getAll()
    {
        return Product::All();
    }
    public function create(array $details)
    {
        // dd($details);
         $product = Product::create( [
            "name" => $details['name'],
            "category_name" => $details['category_name'],
            "cost_price" => $details['cost_price'],
            "sell_price" => $details['sell_price'],
            "description" => $details['description'],
            "image" => $details['image'],
            "esale" => 0
         ]);
      return $product->category()->attach($details['category_id']);
    }
    public function show($id)
    {
        return Product::findOrFail($id);
    }
    public function update($id ,Array $data)
    {
         Table::whereId($id)->update([
            "name" => $details['name'],
            "category_name" => $details['category_name'],
            "cost_price" => $details['cost_price'],
            "sell_price" => $details['sell_price'],
            "description" => $details['description'],
            "image" => $details['image'],
            "esale" => 0
        ]);
        return $product->category->sync($details['category_id']);
    }
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->detach($id);
        return Product::destroy($id);
    }
}