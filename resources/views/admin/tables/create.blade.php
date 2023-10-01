<x-sg-master>
    <div class="content">
        <form method="POST" action="{{route('admin.tables.store')}}">
            @csrf
            @method('POST')
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Guest Number</label>
                <input type="number" name="guest_number" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="mb-3 ">
                <label class="form-check-label" for="exampleCheck1">Status</label>
                <Select class="form-control" name="status">
                  @foreach (App\Enums\TableStatus::cases() as $table)
                  <option value="{{$table->value}}">{{$table->name}}</option>
                  @endforeach
                </Select>
                
              </div>
              <div class="mb-3 ">
                <label class="form-check-label" for="exampleCheck1">Location</label>
                <Select class="form-control" name="location">
                    @foreach (App\Enums\TableLocation::cases() as $location)
                    <option value="{{$location->value}}">{{$location->name}}</option>
                    @endforeach
                </Select>
                
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>

    </div>
</x-sg-master>