<x-master>
    <section id="payment_method">
        <h3>Select Your Payment Method</h3>
        <div class="payment_method container-fluid">
            <div class="credit payment_item">
                <a href="#"><i class="fa-regular fa-credit-card"></i></a>
                <h6>Credit/Debit Card</h6>
            </div>
            <div class="nagod img payment_item">
                <a href="#"><img src="images/nagod.png" height="100px" width="100px"  alt=""></a>
                <h6>Nagod</h6>
            </div>
            <div class="rocket img payment_item">
                <a href="#"><img src="images/rocket.jpeg" height="100px" width="100px" alt=""></a>
                <h6>Rocket</h6>
            </div>
            <div class="bKash img payment_item">
                <a href="#"><img src="images/bkash.png" height="100px" width="100px" alt=""></a>
                <h6>bKash</h6>
            </div>
            <div  class="cash_on payment_item">
                <a href="{{route('address')}}"><i class="fa fa-money-check-dollar"></i></a>
                <h6>Cash On Delivery</h6>
            </div>
        </div>
      </section>
</x-master>