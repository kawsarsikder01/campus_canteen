<x-master>
    <section id="bakery">
        <h3>{{$category->name}}</h3>
        <div class="bakery container">
            @foreach ($category->products as $item)
            <div class="card" style="width: 18rem;">
                <a href="#"><img src="{{Storage::url($item->image)}}" height="300" class="card-img-top" alt="..."></a>
                <div class="card-body">
                  <h5 class="card-title">{{$item->name}}</h5>
                  <a href="#" class="btn btn-primary ">Add to Cart</a>
                  <p>tk {{$item->sell_price}}</p>
                </div>
              </div>
            @endforeach
        </div>
      </section>
</x-master>