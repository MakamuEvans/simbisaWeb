<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable  = ['order_id','menu_id', 'quantity', 'total_price'];

    public function menu(){
        return $this->belongsTo('App\Model\VendorMenu', "menu_id");
    }
}
