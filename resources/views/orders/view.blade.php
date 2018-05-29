@extends('layouts.theme')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/datatables/media/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('src/plugins/datatables/media/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('src/plugins/datatables/media/css/responsive.dataTables.css')}}">
    <style>
        label {
            font-size: 30px !important;
        }

        .label {
            font-size: 30px !important;
        }
    </style>
@endsection
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        @include('layouts._includes.cramps')
                        <div class="col-md-6 col-sm-12 text-right">
                            <a href="" class="btn btn-primary">Confirm Order</a>
                            <a href="" class="btn btn-primary">Notify Delivery Started</a>
                            <a href="" class="btn btn-danger">Cancel Order</a>
                        </div>
                    </div>
                    @include('layouts._includes.alerts')
                </div>
                <!-- Export Datatable start -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                            <div class="clearfix mb-20">
                                <div class="pull-left">
                                    <h5 class="text-blue"></h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2"><label>Order N0.</label></div>
                                <div class="col-md-6 label">#{{$order->id}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">Client</div>
                                <div class="col-md-6">{{$order->client->phone}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">Amount Payable</div>
                                <div class="col-md-6">KES: {{$order->price}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">Order Date</div>
                                <div class="col-md-6">{{$order->created_at}}</div>
                            </div>
                        </div>
                        <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                            <div class="row">
                                <h1>Order Items</h1>

                                <table class="stripe hover multiple-select-row nowrap">
                                    <thead>
                                    <tr>
                                        <th class="table-plus datatable-nosort">Menu Name</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->orderDetails as $detail)
                                        <tr>
                                            <td class="table-plus">{{$detail->menu->name}}</td>
                                            <td>{{$detail->quantity}}</td>
                                            <td>{{$detail->total_price}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h3>Order Progress</h3>
                        <div class="container pd-0">
                            <div class="timeline mb-30">
                                <ul>
                                    @foreach($order->orderStatuses as $status)
                                        <li>
                                            <div class="timeline-date">
                                                {{$status->created_at}}
                                            </div>
                                            <div class="timeline-desc bg-white border-radius-4 box-shadow">
                                                <div class="pd-20">
                                                    <p class="mb-10">{{$status->note}}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Export Datatable End -->
            </div>
            @include('layouts._includes.footer')
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('src/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/media/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/media/js/dataTables.responsive.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/media/js/responsive.bootstrap4.js')}}"></script>
    <!-- buttons for Export datatable -->
    <script src="{{asset('src/plugins/datatables/media/js/button/dataTables.buttons.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/media/js/button/buttons.bootstrap4.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/media/js/button/buttons.print.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/media/js/button/buttons.html5.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/media/js/button/buttons.flash.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/media/js/button/pdfmake.min.js')}}"></script>
    <script src="{{asset('src/plugins/datatables/media/js/button/vfs_fonts.js')}}"></script>
    <script>
        $('document').ready(function () {
            $('.data-table').DataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
                columnDefs: [{
                    targets: "datatable-nosort",
                    orderable: false,
                }],
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "language": {
                    "info": "_START_-_END_ of _TOTAL_ entries",
                    searchPlaceholder: "Search"
                },
            });
            $('.data-table-export').DataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
                columnDefs: [{
                    targets: "datatable-nosort",
                    orderable: false,
                }],
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "language": {
                    "info": "_START_-_END_ of _TOTAL_ entries",
                    searchPlaceholder: "Search"
                },
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'pdf', 'print'
                ]
            });
            var table = $('.select-row').DataTable();
            $('.select-row tbody').on('click', 'tr', function () {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });
            var multipletable = $('.multiple-select-row').DataTable();
            $('.multiple-select-row tbody').on('click', 'tr', function () {
                $(this).toggleClass('selected');
            });
        });
    </script>
@endsection