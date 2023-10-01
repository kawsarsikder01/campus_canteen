<x-master>
    <section id="address">
        <h3>Shipping Address</h3>
        <div class="address">
            <form class=" needs-validation" action="{{route('confirm')}}" method="POST">
                @csrf
                @method('POST')
                <div class="col-md-6 d-block">
                  <label for="validationCustom01" class="form-label">Full Name</label>
                  <input type="text" name="name" class="form-control" id="validationCustom01"  required>
                 
                </div>
                <div class="col-md-6">
                  <label for="validationCustom02" class="form-label">Mobile Number</label>
                  <input type="number" name="phone" class="form-control" id="validationCustom02"  required>
                  
                </div>
                <div class="col-md-6">
                    <label for="validationCustom02" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="validationCustom02"  required>
                  </div>
               
                <div class="col-md-6">
                    <label for="validationCustom04" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="validationCustom03" required>
                  </div>
                
               
                <div class="col-12">
                  <button class="btn btn-info my-5" type="submit">Confirm Order</button>
                </div>
              </form>
        </div>
    </section>
</x-master>