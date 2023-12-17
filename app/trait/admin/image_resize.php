<?php

namespace App\trait\admin;

use Image;

trait image_resize
{
    public function resize_image($request, $field_name, $width, $height, $module_name)
    {
        $image = $request->file($field_name);
        $input['imagename'] = time() . '.' . $image->extension();

        if (!file_exists(public_path('/images/' . $module_name))) {
            mkdir(public_path('/images/' . $module_name));

        }
        $destinationPath = public_path('/images/' . $module_name);
        $img = Image::make($image->path());
        $img->resize($width, $height)->save($destinationPath . '/' . $input['imagename']);

        return 'news_cat/'.$input['imagename'];

    }
}
