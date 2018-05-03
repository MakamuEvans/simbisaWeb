<?php
/**
 * Created by PhpStorm.
 * User: evans
 * Date: 03/05/18
 * Time: 15:44
 */

namespace App\Helper;


class Formatter
{
    /**
     * get the user type
     * @param $user_type
     * @return string
     */
    public static function userType($user_type){
        switch ($user_type) {
            case 1:
                return "Administrator";
                break;
            case 2:
                return "Vendor";
                break;
            case 2:
                return "Teller";
                break;
            default:
                return "Unknown";
        }
    }

}