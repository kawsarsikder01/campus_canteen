<x-sg-master>
    <div class="content">
                <h3>Edit Category</h3>
    
                <form action="{{route('admin.categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Name<span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                            <input type="text" name="name" class="form-control" value="{{$category->name}}">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Description<span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                            <input type="text" name="description" class="form-control" value="{{$category->description}}">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Image<span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                            <input type="file" name="image" class="form-control">
                            </div>
                    </div>
                <x-dataentry.submit/>
                </form>
            </div>
    </x-sg-master>