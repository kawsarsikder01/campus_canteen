<x-sg-master>
    <div class="content">
                <div class="card mt-3">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Products</h5>
                        <a href="{{route('admin.products.create')}}" class="btn btn-info legitRipple">Add Product</a>
                      
                    </div>
    
                    <div class="card-body">
    
                    </div>
    
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer"><div class="datatable-header"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label><span>Filter:</span> <input type="search" class="" placeholder="Type to filter..." aria-controls="DataTables_Table_0"></label></div><div class="dataTables_length" id="DataTables_Table_0_length"><label><span>Show:</span> <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true"><option value="10" data-select2-id="3">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-DataTables_Table_0_length-g1-container"><span class="select2-selection__rendered" id="select2-DataTables_Table_0_length-g1-container" role="textbox" aria-readonly="true" title="10">10</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></label></div></div><div class="datatable-scroll"><table class="table datatable-basic dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Image</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Category</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Job Title: activate to sort column ascending">Cost Price</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="DOB: activate to sort column ascending">Sell Price</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Job Title: activate to sort column ascending">E-sale</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Description</th>
                            <th class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 100px;">Actions</th></tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{$product->name}}</td>
                            <td>
                                <img src="{{Storage::url($product->image)}}" alt="product price" height="50" width="50">
                            </td>
                            <td>{{$product->category_name}}</td>
                            <td>{{$product->cost_price}}</td>
                            <td>{{$product->sell_price}}</td>
                            <td><span class="badge badge-success">Enabled</span></td>
                            <td><span class="badge badge-success">Enabled</span></td>
                            <td><span class="">{{$product->description}}</span></td>
                            <td class="text-center">
                                <div class="d-flex  ">
                                    
                                    <a href="{{route('admin.products.edit',$product->id)}}" class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{route('admin.products.destroy',$product->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table></div><div class="datatable-footer"><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 15 entries</div><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><a class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" id="DataTables_Table_0_previous">←</a><span><a class="paginate_button current" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0">2</a></span><a class="paginate_button next" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" id="DataTables_Table_0_next">→</a></div></div></div>
                </div>
                <!-- /basic datatable -->
    
            </div>
    </x-sg-master>