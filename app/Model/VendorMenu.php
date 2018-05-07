<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VendorMenu extends Model
{
    protected $fillable = ['vendor_id', 'name', 'description', 'img', 'price', 'status'];

    public function vendor(){
        return $this->belongsTo('App\Model\Vendor', 'vendor_id');
    }
}
