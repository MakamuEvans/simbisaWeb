<?php

namespace App\Http\Controllers;

use App\Helper\ResourceHelper;
use App\Http\Requests\MenuRequest;
use App\Model\Vendor;
use App\Model\VendorMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MenuController extends Controller
{
    public function __construct()
    {
        View::share("cramp1", "Menu");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cramp2 = "Add New Vendor Menu";
        $vendors = Vendor::all();
        return view('vendor_menu.create', compact('cramp2', 'vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        $upload_status = ResourceHelper::uploadFile($request->file('file'), public_path('/img/menu'));

        if ($upload_status){
            $request['img'] = $upload_status;
            $menu = new VendorMenu($request->all());
            $menu->save();
            return redirect()->route('vendor-menu.create')->with("status", $menu->name." Successfully Created");
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
