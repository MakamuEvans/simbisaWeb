<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raw extends Model
{
    protected $table = 'raw';
    protected $fillable = ['raw'];
    public $timestamps = false;
}
