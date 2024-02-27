<?php
// app/Utilities/Utility.php

namespace App\Utilities;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class Utility
{
    public static function processImage(Request $request, array &$data, $fieldName, $uploadPath)
    {
        $image = $request->file($fieldName);

        if ($image) {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . "." . $ext;
            $image_url = $uploadPath . $image_full_name;
            $image->move($uploadPath, $image_full_name);
            $data[$fieldName] = $image_url;
        }
    }

    public static function unlink($data, $fieldName)
    {
        $old_file = $data->{$fieldName};
        if ($old_file && file_exists($old_file)) {
            unlink($old_file);
        }
    }

    public static function deleteWithImage($data, $fieldName)
    {
        Utility::unlink($data, $fieldName);
        $delete = $data->delete();
    } 

    public static function handleResult($result, $route, $successMessage, $errorMessage)
    {
        if ($result) {
            Toastr::success($successMessage, 'Message', ["positionClass" => "toast-top-right"]);
            return redirect()->route($route);
        } else {
            Toastr::error($errorMessage, 'Message', ["positionClass" => "toast-top-right"]);
            return back();
        }
    }

    public static function validDataError()
    {
        Toastr::error('* fields are required!', 'Message', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
