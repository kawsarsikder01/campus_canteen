<x-sg-master>
    <div class="content">
                <h3>Add User</h3>
            <form  method="POST" action="{{route('admin.user.update',$user->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Email<span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                               <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                </div>
                            </div>
    
                    <x-dataentry.image/>
    
                   
                   
        
                    <div class="form-group row">
                    <label class="col-form-label col-lg-2">Email<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                        <input type="email" class="form-control" name="email" value="{{$user->email}} ">
                        </div>
                    </div>
                    
        
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Password<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                        <x-sg-password name="password"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2"> Conform Password<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                        <x-sg-password name="password_confirmation"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-2"> Select Role<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            @foreach ($roles as $role)
                            <div class="custom-control custom-checkbox">                        
                                <input class="" type="checkbox" name="roles[]" id="{{$role->id}}" value="{{$role->id}}"> 
                               <label class="" for="">{{$role->name}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                   
                    
                        <x-sg-btn-submit/>
                </div> 
            </form>
           
            </div>
    </x-sg-master>