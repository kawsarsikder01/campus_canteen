<x-sg-master>
    <div class="content">
                 <!-- Table-->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">SL</th>
                    <th scope="col"> First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Date</th>
                    <th scope="col">Table Id</th>
                    <th scope="col">Guest Number</th>
                  </tr>
                </thead>
                <tbody id="tbody">
                    @php
                        $sl = 0
                    @endphp
                   @foreach ($reservations as $item)
                   <tr>
                    <td>{{$sl += 1}}</td>
                    <td>{{$item->first_name}}</td>
                    <td>{{$item->last_name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->tel_number}}</td>
                    <td>{{$item->res_date}}</td>
                    <td>{{$item->table_id}}</td>
                    <td>{{$item->guest_number}}</td>
                    </tr>
                   @endforeach
                </tbody>
              </table>
            </div>
    </x-sg-master>