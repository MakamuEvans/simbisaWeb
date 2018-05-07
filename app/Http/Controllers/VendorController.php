<?php

namespace App\Http\Controllers;

use App\Helper\ResourceHelper;
use App\Http\Requests\VendorRequest;
use App\Model\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class VendorController extends Controller
{
    public function __construct()
    {
        View::share("cramp1", "Users");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cramp2 = "All Vendors";
        $vendors = Vendor::all();
        return view('vendor.index', compact('vendors', 'cramp2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cramp2 = "Add New Vendor";
        return view('vendor.create', compact('cramp2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  VendorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorRequest $request)
    {

        $upload_status = ResourceHelper::uploadFile($request->file('file'));

        if ($upload_status){
            $request['logo'] = $upload_status;
            $vendor = new Vendor($request->all());
            $vendor->save();
            return redirect()->route('vendor.index')->with("status", $vendor->name." Successfully Created");
        }
        return redirect()->route('vendor.create')->with("error", "There was an error creating the Vendor. Please retry later");
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
