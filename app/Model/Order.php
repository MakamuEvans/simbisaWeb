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

    public function client(){
        return $this->belongsTo('App\Model\Client', 'client_id');
    }

    protected $casts = [
        'status'=>'boolean'
    ];


    protected $appends = ['server_id', 'price', 'current_status'];

    public function getServerIdAttribute(){
        return $this->id;
    }

    public function getPriceAttribute(){
        return $this->orderDetails()->sum('total_price');
    }

    public function getCurrentStatusAttribute(){
        return $this->orderStatuses()->orderBy('id', 'desc')->first();
    }
}
