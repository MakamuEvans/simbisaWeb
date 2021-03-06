<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VendorLocation extends Model
{
    protected $fillable = ['vendor_id', 'name', 'geometry', 'tag', 'slang'];

    public function vendor(){
        return $this->belongsTo('App\Model\Vendor', 'vendor_id');
    }
}
