<x-sg-master>
    <div class="content">
        <div class="card p-3 gy-3">
                <h3>About Page Setup</h3>
                <form action="{{route('admin.abouts.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group row">
                        <x-dataentry.label>
                            Heading
                        </x-dataentry.label>
                        <div class="col-lg-10">
                        <x-sg-text name="heading"/>
                        </div>
                    </div>
        
        
                    <div class="form-group row">
                        <x-dataentry.label>
                            Content
                        </x-dataentry.label>
                            <div class="col-lg-10">
                                <x-sg-text name="content"/>
                            </div>
                            </div>
        
                    <x-dataentry.image/>
    
                    <x-dataentry.submit/>
                </form>
            </div>
    
                <div class="card p-3">
                    <h3>About Page</h3>
                    <div class="row mx-auto">
                        @foreach ($about_data as $about)
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-img-actions">
                                        <img class=" w-100 " src="{{Storage::url($about->image)}}" height="400" width="400" alt="">
                                        <div class="card-img-actions-overlay">
                                            <a href="{{asset('image/'.$about->image)}}" class="btn btn-outline bg-white text-white border-white border-2 legitRipple" data-popup="lightbox">
                                                Preview
                                            </a>
                                            <a href="#" class="btn btn-outline bg-white text-white border-white border-2 ml-2 legitRipple">
                                                Details
                                            </a>
                                        </div>
                                    </div>
    
                                    <div class="card-body">
                                        <h5 class="card-title">{{$about->heading}}</h5>
                                        <p class="card-text">{{$about->content}}</p>
                                    </div>
    
                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        <span class="font-size-sm text-uppercase font-weight-semibold">Nov 12, 11:25 am</span>
                                        <span class="font-size-sm text-uppercase text-success font-weight-semibold">
                                            
    
                                           
                                           <a href="{{route('admin.abouts.edit',$about->id)}}" class="btn-sm bg-primary border-2 border-primary btn-icon rounded-round legitRipple shadow mr-1"><i class="icon-pen"></i></a>
                                           <form action="{{route('admin.abouts.destroy',$about->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit"  class="btn-sm bg-danger border-2 border-primary btn-icon rounded-round legitRipple shadow mr-1" ><i class="icon-trash"></i></button>
                                        </form>
                                          
                                        </span>
                                    </div>
                                </div>   
                            </div>
                        @endforeach
                        
                    </div>
                </div>
    </div>
    </x-sg-master>