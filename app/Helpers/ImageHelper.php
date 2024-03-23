<?php
namespace App\Helpers;

use Illuminate\Support\Facades\File;

class ImageHelper
{
    public static function uploadImage($file, $destinationPath)
    {
        $imageName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($destinationPath), $imageName);

        return $imageName;
    }

    public static function deleteImage($imagePath)
    {
        if (File::exists(public_path($imagePath))) {
            File::delete(public_path($imagePath));
        }
    }
}


