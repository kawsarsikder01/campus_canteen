<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;

class ProductContrller extends Controller
{
    protected $product;
    protected $category;

    public function __construct(ProductRepository $product,CategoryRepository $category)
    {
        $this->product = $product;
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->product->getAll();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->category->getAll();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $category =  $this->category->show($request->category_id);
        $image = $request->image->store(('public/product'));
        $data = [
            'name' => $request->name,
            'category_name' => $category->name,
            'category_id' => $request->category_id,
            'cost_price' => $request->cost_price,
            'sell_price' => $request->sell_price,
            'description' => $request->description,
            'image' => $image,
            'esale' => $request->esale
        ];
        $this->product->create($data);
        
        return redirect(route('admin.products.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = $this->category->getAll();
        return view('admin.products.edit',compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductStoreRequest $request, Product $product)
    {
        $image = $product->image;
       if($request->hasFile('image')){
        Storage::delete($product->image);
        $image = $request->image->store(('public/category'));
       }
       $data = [
        'name' => $request->name,
        'category_name' => $category->name,
        'category_id' => $request->category_id,
        'cost_price' => $request->cost_price,
        'sell_price' => $request->sell_price,
        'description' => $request->description,
        'image' => $image,
        'esale' => $request->esale
    ];
    $this->product->update($product->id ,$data);
    
    return redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->product->delete($product->id);
        return view('admin.products.index');
    }
}
