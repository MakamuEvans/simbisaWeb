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
}