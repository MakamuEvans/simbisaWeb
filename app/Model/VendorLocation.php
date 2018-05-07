<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VendorLocation extends Model
{
    protected $fillable = ['vendor_id', 'latitude', 'longitude', 'tag', 'slang'];

    public function getVendor(){
        return $this->belongsTo('App/Model/Vendor', 'vendor_id');
    }
}
