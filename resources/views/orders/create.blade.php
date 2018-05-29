@extends('layouts.theme')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('src/plugins/dropzone/src/dropzone.css')}}">
@endsection()
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        @include('layouts._includes.cramps')
                        <div class="col-md-6 col-sm-12 text-right">
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
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
                </div>
                <!-- Default Basic Forms Start -->
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue">{{$cramp2}}</h4>
                            <p class="mb-30 font-14">* implies Required information</p>
                        </div>
                    </div>
                    @include('layouts._includes.alerts')
                    <form method="post" action="{{route('vendor.store')}}" enctype="multipart/form-data">
                        @csrf()
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Vendor Name *</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" name="name" value="{{old('name')}}"
                                       placeholder="User Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Description</label>
                            <div class="col-sm-12 col-md-10">
                                <textarea class="form-control" name="description">

                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Logo</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="file" name="file">
                            </div>
                        </div>
                        <div class="form-group row">
                            <button type="submit" class="form-control btn btn-primary">Add Vendor</button>
                        </div>
                    </form>
                </div>
                <!-- Default Basic Forms End -->

            </div>
            @include('layouts._includes.footer')
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('src/plugins/dropzone/src/dropzone.js')}}"></script>
    <script>
        Dropzone.autoDiscover = false;
        $(".dropzone").dropzone({
            addRemoveLinks: true,
            removedfile: function (file) {
                var name = file.name;
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            }
        });
    </script>
@endsection()
