<?php
/**
 * Created by PhpStorm.
 * User: evans
 * Date: 04/05/18
 * Time: 15:17
 */

namespace App\Helper;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class ResourceHelper
{
    /**
     * Upload file to server
     *
     * @param UploadedFile $file
     * @return bool
     */

    public static function uploadFile(UploadedFile $file, $path)
    {
        $name = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $final_name = time() . '-' . $name . '.' . $ext;
        //$path = public_path('/img/vendor');
        if ($file->move($path, $final_name)){
            return $final_name;
        }
        return false;
    }

    public static function getLocations($latitude1, $longitude1, $latitude2, $longitude2){
        $earth_radius = 6371;

        $dLat = deg2rad( $latitude2 - $latitude1 );
        $dLon = deg2rad( $longitude2 - $longitude1 );

        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));
        $d = $earth_radius * $c;

        return $d;
    }
}