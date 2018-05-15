<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $fillable = ['order_id', 'level'];
}
