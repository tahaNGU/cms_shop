<?php

namespace App\trait\admin;

use App\Models\admins;

trait admin_convert
{
    public function admin()
    {
        return $this->belongsTo(admins::class, 'admin_id');
    }
}
