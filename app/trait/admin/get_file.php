<?php

namespace App\trait\admin;

trait get_file{
    public function upload_file($request,$file)
    {
        $imageName = time().'.'.$request->$file->extension();

        // Public Folder
        $request->$file->move('images/'.public_path($file), $imageName);
        return $imageName;
    }
}
