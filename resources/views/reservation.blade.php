<x-master>
  @if (session('success'))
  <div class="alert alert-success alert-dismissable custom-success-box" style="margin: 15px;">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong> {{ session('update') }} </strong>
  </div>
@endif
    <section id="reservation"class="container" >
        <h3>table booking</h3>
        <div class="table-booking container">
        <form action="/reservation" method="POST">
            @csrf
            @method('post')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('first_name')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('last_name')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
              </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email"name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              @error('email')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Phone</label>
              <input type="number"name="tel_number" class="form-control" id="exampleInputPassword1">
              @error('tel_number')
              <div class="text-sm text-red-400">{{ $message }}</div>
          @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Date</label>
                <input type="datetime-local"name="res_date" class="form-control">
                @error('res_date')
                    <div class="text-sm text-red-400">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Guest Number</label>
                <input type="number" name="guest_number" class="form-control"  aria-describedby="emailHelp">
                @error('guest_number')
                <div class="text-sm text-red-400">{{ $message }}</div>
            @enderror
              </div>
              <div class="mb-3">
                <label for="status" class="block text-sm font-medium text-gray-700">Table</label>
                <div class="mt-1">
                    <select id="table_id" name="table_id" class="form-control">
                        @foreach ($tables as $table)
                            <option value="{{ $table->id }}">{{ $table->name }}
                                ({{ $table->guest_number }} Guests)
                            </option>
                        @endforeach
                    </select>
                </div>
              </div>
            <button type="submit" class="button px-4">Book Now</button>
          </form>
        </div>
      </section>
</x-master>