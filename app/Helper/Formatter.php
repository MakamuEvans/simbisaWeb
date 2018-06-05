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
            case 3:
                return "Teller";
                break;
            default:
                return "Unknown";
        }
    }

    /**
     * interpret client activation status
     * @param $status
     * @return string
     */
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

    /**
     * Interpret a status
     * @param $status
     * @return string
     */
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

    /**
     * interpretation for different order statuses
     * @param $status
     * @return string
     */
    public static function decodeOrderStatus($status){
        switch ($status){
            case 0:
                return 'Order Placed';
                break;
            case 1:
                return 'Order Confirmed by Vendor';
                break;
            case 2:
                return 'Preparations Done. Your order is in the delivery process';
                break;
            case 3:
                return 'Order Delivered';
                break;
            case 5:
                return 'Order Cancelled by Vendor';
                break;
            default:
                return "unknown";
        }
    }


    public static function decodeOrder($status){
        switch ($status){
            case 0:
                return 'Still Processing';
                break;
            case 1:
                return 'Finished';
                break;
            default:
                return "unknown";
        }
    }

}