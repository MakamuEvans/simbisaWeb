@extends('layouts.theme')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        @include('layouts._includes.cramps')
                        <div class="col-md-6 col-sm-12 text-right">
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
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
                    <form method="post" action="{{route('user.store')}}">
                        @csrf()
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">User Name *</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="User Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Email address *</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Email Address" value="{{old('email')}}" u type="email" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Phone Number</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" value="{{old('phone')}}" name="phone" type="tel">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">User Type *</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="user_type">
                                    <option selected="">Choose...</option>
                                    <option value="1">Administrator</option>
                                    <option value="2">Vendor</option>
                                    <option value="3">Teller</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Password *</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" value="" type="password" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Password Re-type *</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" value="" type="password" name="password_confirmation">
                            </div>
                        </div>
                        <div class="form-group row">
                            <button type="submit" class="form-control btn btn-primary">Create User</button>
                        </div>
                    </form>
                </div>
                <!-- Default Basic Forms End -->

            </div>
            @include('layouts._includes.footer')
        </div>
    </div>
@endsection
