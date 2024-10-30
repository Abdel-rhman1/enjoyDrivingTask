    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('plugins/src/mousetrap/mousetrap.min.js') }}"></script>
    <script src="{{ asset('plugins/src/waves/waves.min.js') }}"></script>
    <script src="{{ asset('collapsible-menu/app.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('plugins/src/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/dash_2.js') }}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <script src="{{ asset('plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('plugins/src/mousetrap/mousetrap.min.js') }}"></script>
    <script src="{{ asset('plugins/src/waves/waves.min.js') }}"></script>
    <script src="{{ asset('collapsible-menu/app.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('plugins/src/table/datatable/datatables.js') }}"></script>
    <script>
        $('#zero-config').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 10
        });
    </script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        var map = L.map('map').setView([0, 0], 8); // Set initial view
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var userLat = position.coords.latitude;
                var userLng = position.coords.longitude;
                // Center the map on the user's location
                map.setView([userLat, userLng], 13);
                // Add a marker for the user's location
                L.marker([userLat, userLng]).addTo(map).bindPopup("You are here").openPopup();
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                // Items from database
                @isset($resturants)
                    var items = @json($resturants);
                @endisset


                // Loop through items and add markers to the map
                items.forEach(function(item) {
                    var marker = L.marker([item.location_lat, item.location_lng]).addTo(map);
                    marker.bindPopup("<b>" + item.name + "</b>").openPopup();
                });

            });
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('addRow').addEventListener('click', function() {
                var table = document.getElementById('dynamicTable').getElementsByTagName('tbody')[0];
                var newRow = table.rows[0].cloneNode(true);
                var inputs = newRow.getElementsByTagName('input');

                for (var i = 0; i < inputs.length; i++) {
                    inputs[i].value = '';
                }

                table.appendChild(newRow);

                // Add event listener for the remove button
                newRow.querySelector('.removeRow').addEventListener('click', function() {
                    this.closest('tr').remove();
                });
            });

            // Add event listener for the initial remove button
            document.querySelectorAll('.removeRow').forEach(function(button) {
                button.addEventListener('click', function() {
                    this.closest('tr').remove();
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#resturantSelect').change(function() {
                var resturantId = $(this).val();

                if (resturantId) {
                    $.ajax({
                        url: '{{ url('/menus/ajax') }}/' + resturantId,
                        type: 'GET',
                        success: function(response) {
                            console.log(response);
                            if (response.success) {
                                var options = '<option value="">Select...</option>';
                                $.each(response.data, function(index, item) {
                                    options += '<option value="' + item.id + '">' + item
                                        .name + '</option>';
                                });
                                $('#MenuBox').html(options);
                            } else {
                                $('#MenuBox').html(
                                    '<option value="">No options available</option>');
                            }

                        },
                        error: function(xhr) {
                            console.error(xhr);
                        }
                    });
                } else {
                    $('#dataContainer').html('');
                }
            });
        });
    </script>

    </body>

    </html>
