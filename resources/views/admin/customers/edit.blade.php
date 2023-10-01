<x-sg-master>
    <div class="content">
                <h3>Edit Customer</h3>
    
                <form action="{{route('admin.customers.update',$customer->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Name<span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                            <input type="text" name="name" class="form-control" value="{{$customer->name}}" >
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Email<span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                            <input type="email" name="email" class="form-control" value="{{$customer->email}}" >
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Phone<span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                            <input type="number" name="phone_no" class="form-control" value="{{$customer->phone_no}}">
                            </div>
                    </div>
                <x-dataentry.submit/>
                </form>
            </div>
    </x-sg-master>