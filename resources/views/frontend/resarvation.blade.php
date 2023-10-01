<x-master>
     <!--Reservation Section-->
     <section id="reservation"class="container" >
        <h3>table booking</h3>
        <div class="table-booking container">
        <form id="form_data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
              </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email"name="email" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Phone</label>
              <input type="number"name="phone" class="form-control" id="phone">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Date</label>
                <input type="date"name="date" class="form-control" id="date" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Time</label>
                <input type="time"name="time" class="form-control" id="time" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Table Number</label>
                <input type="number" name="seats" class="form-control" id="table_number" aria-describedby="emailHelp">
              </div>
            <button type="submit" id="submit" class="button px-4">Book Now</button>
          </form>
        </div>
      </section>
      <script src="{{asset('js/reservation.js')}}"></script>
</x-master>