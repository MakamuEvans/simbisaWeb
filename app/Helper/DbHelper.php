<?php
/**
 * Created by PhpStorm.
 * User: evans
 * Date: 04/05/18
 * Time: 15:07
 */

namespace App\Helper;


use App\Model\Client;

class DbHelper
{
    public static function sendActivationCode($phone_number, Client $client){
        $random_number = str_random(6);
        $client = $client->first();
        $client->update(['activation_code', $random_number]);

        //send sms to client

    }
}