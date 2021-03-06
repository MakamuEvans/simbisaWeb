<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Model\Vendor;
use App\Model\VendorLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LocationController extends Controller
{
    public function __construct()
    {
        View::share("cramp1", "Users");
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cramp2 = "Vendor Locations";
        $vendors = VendorLocation::where('vendor_id', $request->vendor);
        return view('vendor_location.index', compact('vendors', 'cramp2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cramp2 = "Add New Vendor Location";
        $vendors = Vendor::all();
        return view('vendor_location.create', compact('cramp2', 'vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
        if (Vendor::where('id', $request->vendor_id)->exists()){
            $location = new VendorLocation($request->all());
            $location->save();
            return redirect()->route('vendor.index')->with("status", $location->name." Successfully Added");
        }else{
            return redirect()->route('vendor.index')->with("error", "An Error Occurred. Check your Details");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
