<?php

namespace App\trait\admin;

use App\Models\admins;

trait content
{
    public function content(){
        return $this->morphMany('App\\Models\\content','content');
    }

}
