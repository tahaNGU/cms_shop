<?php

namespace App\trait\admin;

trait convert_Verta
{
    public function convert_Verta(){
        return verta($this->created_at)->format('%B %d، %Y');
    }
}
