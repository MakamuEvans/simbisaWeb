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

    public static function clientActivation($status){
        switch ($status){
            case 1:
                return 'Verified';
                break;
            case 0:
                return 'Pending Verification';
                break;
            default:
                return 'Unknown';
        }
    }

    public static function decodeStatus($status){
        switch ($status){
            case 1:
                return 'Active';
                break;
            case 0:
                return 'Inactive';
                break;
            default:
                return 'Unknown';
        }
    }

}