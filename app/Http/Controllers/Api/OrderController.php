<?php

namespace App\Http\Controllers\Api;

use App\Helper\Formatter;
use App\Model\Client;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\OrderStatus;
use App\Model\VendorMenu;
use App\Raw;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Symfony\Component\Console\Helper\Helper;

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
            $menu = VendorMenu::findorFail($dt['menu_id']);
            $detail = new OrderDetail(array(
                'order_id'=>$order->id,
                'menu_id'=>$dt['menu_id'],
                'quantity'=>$dt['quantity'],
                'total_price'=>$dt['quantity']*$menu->price
            ));
            $detail->save();

            array_push($menuz, VendorMenu::findorFail($detail->menu_id));
        }
        $order_status = new OrderStatus(array(
            'order_id'=>$order->id,
            'level'=>0
        ));
        $order_status->save();

        $response->menus = $menuz;
        $order_statuses = OrderStatus::where('order_id', $order->id)->get();
        foreach ($order_statuses as $dt){
            $dt->server_id = $dt->id;
            $dt->note = Formatter::decodeOrderStatus($dt->level);
        }
        $response->order_statuses = $order_statuses;

        return Response::json($response);
    }

    public function OrderHistory($phone_number){
        $client = Client::where('phone', $phone_number)->with(['orders.orderStatuses','orders.orderDetails' ])->first();
        $client->server_id = $client['id'];
        return Response::json($client);
        //dd($client);
    }
}
