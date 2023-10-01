<x-sg-master>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Amount</th>
            <th scope="col">Transaction Id</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($orders as $item)
            <tr>
                <td >{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <th >{{$item->phone}}</th>
                <td >{{$item->address}}</td>
                <td>{{$item->amount}}</td>
                <th >{{$item->transaction_id}}</th>
                <td class="badge badge-warning">{{$item->status}}</td>
                <td>
                    <a href="{{route('admin.orders.show',$item->id)}}" class="btn-sm bg-success border-2 border-primary btn-icon rounded-round legitRipple shadow mr-1"><i class="icon-eye"></i></a>
                    <a href="" class="btn-sm bg-primary border-2 border-primary btn-icon rounded-round legitRipple shadow mr-1"><i class="icon-pen"></i></a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
</x-sg-master>