@include('Dashboard.layouts.header')
@include('Dashboard.layouts.navbar')
@include('Dashboard.layouts.sidebar')
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="middle-content container-xxl p-0">
            <div class="row layout-top-spacing">
                <a href="{{ route('orders.create') }}" class="btn btn-success">Add New Order</a>
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-8">
                        <table id="zero-config" class="table dt-table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Resturent</th>
                                    <th>status</th>
                                    <th class="no-content">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}
                                        </td>

                                        <td>
                                            {{ $order->resturant->name }}
                                        </td>

                                        <td>
                                            {{ $order->status }}
                                        </td>

                                        <td>
                                            <a href="{{ route('menus.edit', $order->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <a href="{{ route('menus.delete', $order->id) }}"
                                                class="btn btn-danger">Delete</a>
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


</div>
<!--  END CONTENT AREA  -->
</div>

@include('Dashboard.layouts.footer')
