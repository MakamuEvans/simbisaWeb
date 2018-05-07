<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
     protected $fillable = ['name', 'logo', 'description'];

     public function locations(){
         return $this->hasMany("App\Model\VendorLocation", 'vendor_id');
     }

     public function menus(){
         return $this->hasMany('App\Model\VendorMenu', 'vendor_id');
     }

}
