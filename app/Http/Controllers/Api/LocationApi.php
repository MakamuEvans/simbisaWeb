<?php

namespace App\Http\Controllers\Api;

use App\Helper\ResourceHelper;
use App\Model\Vendor;
use App\Model\VendorLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class LocationApi extends Controller
{
    public function getLocations(Request $request){
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $locations = VendorLocation::where('vendor_id', $request->vendor_id)->get();
        $relevant_locations = array();

        foreach ($locations as $location){
            $l = explode(":", $location->geometry);
            $distance = ResourceHelper::getLocations($latitude, $longitude,$l[0], $l[1]);
            if ($distance < 3){
                $location['distance'] = $distance;
                $location['server_id'] = $location->id;
                $location['latitude'] = $l[0];
                $location['longitude'] = $l[1];
                array_push($relevant_locations, $location);
            }
        }

        return Response::json($relevant_locations);
    }
}
