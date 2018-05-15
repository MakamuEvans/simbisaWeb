<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['client_id', 'location_id', 'status'];

    public function orderDetails(){
        return $this->hasMany('App\Model\OrderDetail', 'order_id');
    }

    public function orderStatuses(){
        return $this->hasMany('App\Model\OrderStatus', 'order_id');
    }
    protected $casts = [
        'status'=>'boolean'
    ];
}
