@include('Dashboard.layouts.header')
@include('Dashboard.layouts.navbar')


@include('Dashboard.layouts.sidebar')
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="middle-content container-xxl p-0">
            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Datatables</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Basic</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->

            <div class="row layout-top-spacing">
                <a href="{{route('resturants.create')}}" class="btn btn-success">Add New Resturant</a>
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-8">
                        <table id="zero-config" class="table dt-table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>

                                    <th class="no-content">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resturants as $resturant)
                                    <tr>
                                        <td>{{ $resturant->name }}
                                        </td>

                                        <td>
                                            {{ $resturant->location_lat }} -

                                            {{ $resturant->location_lng }}
                                        </td>

                                        <td>
                                            <a href="{{route('resturants.edit' , $resturant->id)}}" class="btn btn-primary">Edit</a>
                                            <a href="{{route('resturants.delete' , $resturant->id)}}" class="btn btn-danger">Delete</a>

                                            <a href="{{route('menus.index' , $resturant->id)}}" class="btn btn-success">Menu</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!--  BEGIN FOOTER  -->
    <div class="footer-wrapper mt-0">
        <div class="footer-section f-section-1">
            <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank"
                    href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
        </div>
        <div class="footer-section f-section-2">
            <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-heart">
                    <path
                        d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                    </path>
                </svg></p>
        </div>
    </div>
    <!--  END CONTENT AREA  -->
</div>
<!--  END CONTENT AREA  -->
</div>

@include('Dashboard.layouts.footer')
