<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\SliderRepository;
use App\Http\Requests\SliderStoreRequest;
use App\Models\Slider;

class SliderContrller extends Controller
{
    protected $slider;
    public function __construct(SliderRepository $slider)
    {
        $this->slider = $slider;
    }
    public function index()
    {
       $sliders = $this->slider->getAll();
       return view('admin.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->status);
        $image = $request->image->store(('public/slider'));
        if(isset($request->status)){
            $this->slider->create([
                'heading' => $request->heading,
                'content' => $request->content,
                'image' => $image,
                'status' => '1'
            ]);
        }
        else{
            $this->slider->create([
                'heading' => $request->heading,
                'content' => $request->content,
                'image' => $image
            ]);
        }
        
        return redirect(route('admin.sliders.index'));
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
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderStoreRequest $request, Slider $slider)
    {
        $image = $slider->image;
       if($request->hasFile('image')){
        Storage::delete($slider->image);
        $image = $request->image->store(('public/slider'));
       }
       $data = [
        'heading' => $request->heading,
        'content' => $request->content,
        'image'  => $image
       ];
       $this->slider->update($about->id , $data);
       return redirect(route('admin.sliders.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $this->slider->delete($slider->id);
        return redirect(route('admin.sliders.index'));
    }
}
