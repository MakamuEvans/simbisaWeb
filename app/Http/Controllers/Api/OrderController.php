<?php

namespace App\Http\Controllers\Api;

use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\VendorMenu;
use App\Raw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class OrderController extends Controller
{
    public function Order(Request $request){
        $data = json_decode($request->data, true);

        $order = new Order(array(
            'client_id'=>$data['client_id'],
            'location_id'=>$data['location_id'],
            'status'=>false
        ));
        $order->save();
        $response = $order;
        $response->server_id = $order->id;
        $menuz = array();

        foreach ($data['menu'] as $dt){
            $detail = new OrderDetail(array(
                'order_id'=>$order->id,
                'menu_id'=>$dt['menu_id'],
                'quantity'=>$dt['quantity']
            ));
            $detail->save();

            array_push($menuz, VendorMenu::findorFail($detail->menu_id));
        }
        $response->menus = $menuz;

        return Response::json($response);
    }
}
