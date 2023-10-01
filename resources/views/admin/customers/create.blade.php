<x-sg-master>
    <div class="content">
                <h3>Add Customer</h3>
    
                <form action="{{route('admin.customers.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Name<span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                            <input type="text" name="name" class="form-control" >
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Email<span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                            <input type="email" name="email" class="form-control" >
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Phone<span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                            <input type="number" name="phone_no" class="form-control">
                            </div>
                    </div>
                <x-dataentry.submit/>
                </form>
            </div>
    </x-sg-master>