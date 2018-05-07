@extends('layouts.theme')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/datatables/media/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('src/plugins/datatables/media/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('src/plugins/datatables/media/css/responsive.dataTables.css')}}">
@endsection
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        @include('layouts._includes.cramps')
                        <div class="col-md-6 col-sm-12 text-right">
                            <div class="dropdown">
                                <a class="btn btn-primary dropdown-toggle" href="#" role="button"
                                   data-toggle="dropdown">
                                    January 2018
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Export List</a>
                                    <a class="dropdown-item" href="#">Policies</a>
                                    <a class="dropdown-item" href="#">View Assets</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('layouts._includes.alerts')
                </div>
                <!-- Export Datatable start -->
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <h5 class="text-blue">{{$request->type}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        @if($request->type == 'locations')
                            <table class="stripe hover multiple-select-row data-table-export nowrap">
                                <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">Name</th>
                                    <th>Coordinates</th>
                                    <th>Map Place Id</th>
                                    <th>Created On</th>
                                    {{--<th class="datatable-nosort">Action</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vendor->locations as $location)
                                    <tr>
                                        <td class="table-plus">{{$location->name}}</td>
                                        <td>{{$location->geometry}}</td>
                                        <td>{{$location->tag}}</td>
                                        <td>{{$location->created_at}}</td>
                                        {{--<td>
                                            <div class="dropdown">
                                                <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button"
                                                   data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i class="fa fa-eye"></i> View</a>
                                                    <a class="dropdown-item" href="#"><i class="fa fa-pencil"></i> Edit</a>
                                                    <a class="dropdown-item" href="#"><i class="fa fa-trash"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @elseif($request->type == 'menu')
                            <table class="stripe hover multiple-select-row data-table-export nowrap">
                                <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Updated On</th>
                                    {{--<th class="datatable-nosort">Action</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vendor->menus as $menu)
                                    <tr>
                                        <td class="table-plus">{{$menu->name}}</td>
                                        <td>{{$menu->description}}</td>
                                        <td>{{$menu->price}}</td>
                                        <td>{{$menu->status}}</td>
                                        <td>{{$menu->updated_at}}</td>
                                        {{--<td>
                                            <div class="dropdown">
                                                <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button"
                                                   data-toggle="dropdown">
                                                    <i class="fa fa-ellipsis-h"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i class="fa fa-eye"></i> View</a>
                                                    <a class="dropdown-item" href="#"><i class="fa fa-pencil"></i> Edit</a>
                                                    <a class="dropdown-item" href="#"><i class="fa fa-trash"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
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