<?php

namespace App\Model;

use App\Helper\Formatter;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $fillable = ['order_id', 'level'];

    protected $appends = ['note'];

    public function order(){
        return $this->belongsTo('App\Model\Order', 'order_id');
    }

    public function getNoteAttribute(){
        return Formatter::decodeOrderStatus($this->level);
    }
}
