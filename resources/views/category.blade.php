<x-master>
    <section id="categorey" class="container">
        <h3>Categorey</h3>
        <div class="categorey">
            @foreach ($categories as $item)
            <div class="categorey-item">
                <a href="/category/{{$item->id}}">{{$item->name}}</a>
            </div>
            @endforeach
        </div>
    </section>
</x-master>