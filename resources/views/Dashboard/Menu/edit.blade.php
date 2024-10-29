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
                                    <h4>Edit Item</h4>
                                </div>
                            </div>  
                        </div>
                        <div class="widget-content widget-content-area p-3">
                            <form class="row g-3 needs-validation" novalidate action="{{route('menus.update')}}" method="post">
                                @csrf
                                <div class="col-md-4">
                                    <input name="menuId" value="{{$menu->id}}" type="hidden">
                                    <label for="validationCustom02" class="form-label">Resturant</label>
                                    <select name="resturant_id" class="form-control">
                                        <option> Select Resturant</option>
                                        @foreach ($resturants as $resturant)
                                            <option 
                                                @if($resturant->id==$menu->resturant_id)
                                                    selected
                                                @endif
                                            value="{{$resturant->id}}">{{$resturant->name}}</option>
                                        @endforeach
                                    </select>
                                    
                                   
                                </div>


                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Name</label>
                                    <input type="text" value="{{$menu->name}}" name="name" class="form-control" id="validationCustom01" value="Mark"
                                        required>
                                  
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom02" class="form-label">Price</label>
                                    <input type="number" value="{{$menu->price}}" name="price" class="form-control" id="validationCustom02" value="Otto"
                                        required>
                                   
                                </div>
                            
                                <div class="col-md-12">
                                    <label for="validationCustom05" class="form-label">Details</label>
                                    <textarea rows="4" class="form-control" id="validationCustom05" name="description">{{$menu->description}}</textarea>
                                </div>
                              
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
