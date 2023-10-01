<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\CategoryRepository;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Categorie;
use Illuminate\Support\Facades\Storage;

class CategoryContrller extends Controller
{
    protected $category;
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->category->getAll();  
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $image = $request->image->store(('public/category'));
        $this->category->create([
            'name' => $request->name,
            'description' =>$request->description,
            'image' => $image
        ]);
        return redirect(route('admin.categories.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryStoreRequest $request, Categorie $category)
    {
        
        $image = $category->image;
       if($request->hasFile('image')){
        Storage::delete($category->image);
        $image = $request->image->store(('public/category'));
       }
       $data = [
        'name' => $request->name,
        'description' => $request->description,
        'image'  => $image
       ];
       $this->category->update($category->id , $data);
       return redirect(route('admin.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $category)
    {
        Storage::delete($category->image);
        $this->category->delete($category->id);
        return redirect(route('admin.categories.index'));
    }
}
