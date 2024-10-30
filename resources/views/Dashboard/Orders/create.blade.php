@include('Dashboard.layouts.header')
@include('Dashboard.layouts.navbar')


@include('Dashboard.layouts.sidebar')
<div id="content" class="main-content">
    <div class="container">
        <div class="container">
            <div class="row mt-5 px-2">
                <div id="custom_styles" class="col-lg-12 layout-spacing col-md-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Add New Order</h4>
                                </div>
                            </div>  
                        </div>
                        <div class="widget-content widget-content-area p-3">
                            <form class="row g-3 needs-validation" novalidate action="{{route('orders.store')}}" method="post">
                                @csrf
                                <div class="col-md-4">
                                    <label for="validationCustom02" class="form-label">Resturant</label>
                                    <select id="resturantSelect" name="resturant_id" class="form-control">
                                        <option> Select Resturant</option>
                                        @foreach ($resturants as $resturant)
                                            <option value="{{$resturant->id}}">{{$resturant->name}}</option>
                                        @endforeach
                                    </select>
                                    
                                   
                                </div>                            
                                <div class="col-md-12">
                                    <label for="validationCustom05" class="form-label">Details</label>
                                    <textarea rows="4" class="form-control" id="validationCustom05" name="description"></textarea>
                                </div>
                              
                                <table id="dynamicTable">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select id="MenuBox" name="items[menuIds][]" class="form-control" placeholder="Item">
                                                </select>
                                            </td>
                                                {{-- <input id="MenuBox" type="text" class="form-control" name="items['menuIds'][]" placeholder="Item"></td> --}}
                                            <td><input type="email" class="form-control" name="items[quantity][]" placeholder="Quantity"></td>
                                            <td><button type="button" class="removeRowb btn btn-danger">Remove</button></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <button type="button" id="addRow">Add Order Item</button>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@include('Dashboard.layouts.footer')
