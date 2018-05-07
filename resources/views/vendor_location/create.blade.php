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
                    <form method="post" action="{{route('vendor-location.store')}}">
                        @csrf()
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Vendor Name *</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="vendor_id" id="vendor_id">
                                    <option selected="">Choose...</option>
                                    @foreach($vendors as $vendor)
                                        <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Location Name *</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" name="name" value="{{old('name')}}"
                                       placeholder="Location Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Location Tag *</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" name="tag" id="tag" value="{{old('tag')}}"
                                       readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Coordinate</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" name="geometry" id="geometry" value="{{old('geometry')}}"
                                       readonly>
                            </div>
                        </div>
                        <div id="map" class="form-control form-group row" style="height: 400px"></div>
                        <div class="form-group row">
                            <button type="submit" id="add_location" class="form-control btn btn-primary">Add Location</button>
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
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_x_HdSpXoOd7clgpovw6ypeYrqGsB7O4&libraries=places">
    </script>
    <script>
        $('#vendor_id').on('change', function() {
            //alert( this.value );
        });


        var uluru;
        var service;
        var map;
        var marker;
        navigator.geolocation.getCurrentPosition(function(location) {
            console.log(location.coords.latitude);
            console.log(location.coords.longitude);
            console.log(location.coords.accuracy);

            var uluru = {lat: location.coords.latitude, lng: location.coords.longitude};
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: uluru
            });


          //  addmarker(uluru);

            var request = {
                location: uluru,
                radius: '5000',
                query: 'Pizza Inn'
            };

            service = new google.maps.places.PlacesService(map);
            service.textSearch(request, callback);


        });




        function addmarker(position) {
            var marker = new google.maps.Marker({
                position: position,
                map: map
            });
        }


        function callback(results, status) {
            if (status == google.maps.places.PlacesServiceStatus.OK) {
                for (var i = 0; i < results.length; i++) {
                    var place = results[i];
                    console.log(place);
                    //console.log(place.formatted_address + '- PIzza Inn');


                    var imageUrl = 'https://maps.gstatic.com/mapfiles/place_api/icons/restaurant-71.png';
                    var myLatlng = new google.maps.LatLng(place.geometry.location.lat(),place.geometry.location.lng());


                    marker = new google.maps.Marker({
                       map: map
                    });

                    marker.setPlace({
                        placeId: place.place_id,
                        location: place.geometry.location,
                    });
                    marker.setVisible(true);

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            console.log(results[i].name);
                            $('#tag').val(results[i].place_id);
                            $('#geometry').val(results[i].geometry.location.lat()+':'+results[i].geometry.location.lng());

                        }
                    })(marker, i));
                }
            }
        }




        /*function initMap() {
            var uluru = {lat: -25.363, lng: 131.044};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });

            google.maps.event.addListener(map, "click", function (e) {
                console.log(e.latLng.lat());
            });
        }*/
    </script>
@endsection()
