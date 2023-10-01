<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Repository\AboutRepository;
use App\Http\Requests\AboutRequest;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    protected $about;
    public function __construct(AboutRepository $about)
    {
        $this->about = $about;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about_data  = $this->about->getAll();
        return view('admin.about.index',compact('about_data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AboutRequest $request)
    {
        $image = $request->image->store(('public/about'));
        $this->about->create([
            'heading' => $request->heading,
            'content' => $request->content,
            'image' => $image
        ]);
        return redirect(route('admin.abouts.index'));
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
    public function edit(About $about)
    {
       return view('admin.about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutRequest $request, About $about)
    {
        $image = $about->image;
       if($request->hasFile('image')){
        Storage::delete($about->image);
        $image = $request->image->store(('public/about'));
       }
       $data = [
        'heading' => $request->heading,
        'content' => $request->content,
        'image'  => $image
       ];
       $this->about->update($about->id , $data);
       return redirect(route('admin.abouts.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        Storage::delete($about->image);
        $this->about->delete($about->id);
        return redirect(route('admin.abouts.index'));
    }
}
