<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'phone', 'status', 'activated', 'activation_code'];

    public function orders(){
        return $this->hasMany('App\Model\Order', 'client_id')->orderBy('id', 'desc');
    }

    protected $casts = [
        'activated'=>'boolean',
    ];
}
