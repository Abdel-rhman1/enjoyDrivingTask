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
                                    <h4>Add New Resturant</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area p-3">
                            <form class="row g-3 needs-validation" novalidate action="{{route('resturants.update')}}" method="post">
                                @csrf
                                <div class="col-md-4">
                                    <input type="hidden" name="id" value={{$resturant->id}}>
                                    <label for="validationCustom01" class="form-label">Name</label>
                                    <input type="text" name="name" value="{{$resturant->name}}" class="form-control" id="validationCustom01" value="Mark"
                                        required>
                                  
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom02" class="form-label">location Lat</label>
                                    <input type="text" 
                                    value="{{$resturant->location_lat}}"
                                    name="location_lat" class="form-control" id="validationCustom02" value="Otto"
                                        required>
                                   
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Location Lang</label>
                                    <div class="input-group has-validation">
                                        <input 
                                    value="{{$resturant->location_lng}}"
                                        
                                        type="text" name="location_lng" class="form-control" id="validationCustomUsername"
                                            aria-describedby="inputGroupPrepend" required>
                                        
                                    </div>
                                </div>
                               
                                <div class="col-md-12">
                                    <label for="validationCustom05" class="form-label">Details</label>
                                    <textarea rows="4"

                                    value="
                                    @if (isset($resturant->details))
                                        {{$resturant->details}}
                                    @else 
                                        ''
                                    @endif" 
                                    
                                    
                                    
                                    class="form-control" id="validationCustom05" name="details"></textarea>
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
