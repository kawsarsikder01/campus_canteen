<header class="header">
      <nav class="navbar navbar-expand-lg bg-body-tertiary  bg-dark"data-bs-theme="dark">
        <div class="container my-2">
          <a class="navbar-brand" href="#">College <span class="text-warning">Canteen</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto me-5 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/menu">Menu</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link " href="/category">Categorey</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/reservation/create">Reservation</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/contact">Contact</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
              </li>
             
            </ul>
            <a class="btn btn-info shopping-cart mx-4"><i class="fa fa-shopping-cart text-light"></i> <span class="badge badge-pill badge-danger">{{count((array) session('cart'))}}</span></a>
            
            
           
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            
          </div>
        </div>
      </nav>
      <div class="sidebar cart-items">
        <div class="head"><p>My Cart</p></div>
        <div id="cartItem">
      
          @foreach ((array)session('cart') as $id => $item)
          <div class="cart-item" data-id="{{$id}}">
            <div class="row-img">
                <img class="rowimg" src="{{Storage::url($item['image'])}}" width="45" height="45">
            </div>
            <p style ="font-size:12px">{{$item['name']}}</p>
            <h2 style="font-size:15px;">{{$item['quantity']}}</h2>
            <h2 style="font-size:15px;">{{$item['sell_price']*$item['quantity']}}</h2>
            <a href="" class="cart_remove"><i class='fa-solid fa-trash' id="" id="delete" style="cursor: pointer"></i></a>
          </div>
          @endforeach
         <script>
          $(".cart_remove").click(function (e) {
            e.preventDefault();

        var ele = $(this);

       if(confirm("Do you really want to remove?")) {
        $.ajax({
        url: '{{ route('remove_from_cart') }}',
          method: "DELETE",
          data: {
          _token: '{{ csrf_token() }}', 
          id: ele.parents("div").attr("data-id")
          },
          success: function (response) {
          window.location.reload();
          console.log("hello");
            }
      });
        }
        
    });
         </script>
           
          </div>
        <div class="foot">
          @php
              $total = 0;
              foreach ((array) session('cart') as $id => $details) {
                $total += $details['sell_price']* $details['quantity'];
              }
          @endphp
          
            <h3>Total</h3>
            <h2 id="total">tk .{{$total}}</h2>
           <a href="{{route('checkout')}}" class="checkout">Checkout</a>
        </div>
    </div>
    <div class="user">
      <a href="">manage my account</a>
      <a href="">my orders</a>
      <a href="">My Reviews</a>
      <a href="">My Returns & Cancellation</a>
      <a href="shipping_address.html">shipping address</a>
      <a href="">Logout</a>
    </div>
    </header>
