<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\Model\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{
    public function __construct()
    {
        View::share("cramp1", "Orders");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('orders.id', 'desc')->with('orderDetails.menu')->get();
        $cramp2 = "Orders";

        return \view('orders.index', compact('orders', 'cramp2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findorFail($id);
        $cramp2 = '#'.$id;
        return \view('orders.view', compact('order', 'cramp2'));
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

    public function confirmOrder($id){
        $confirm = new OrderStatus(array(
            'order_id'=>$id,
            'level'=>1
        ));
        $confirm->save();
        return redirect()->back()->with('status', 'Order Confirmed');
    }

    public function notifyDelivery($id){
        $confirm = new OrderStatus(array(
            'order_id'=>$id,
            'level'=>2
        ));
        $confirm->save();
        return redirect()->back()->with('status', 'Delivery Initiated');
    }

    public function cancelOrder($id){
        $confirm = new OrderStatus(array(
            'order_id'=>$id,
            'level'=>5
        ));
        $confirm->save();
        $confirm->order->update(['status'=>true]);
        return redirect()->back()->with('status', 'Order Cancelled Successfully');
    }
}
