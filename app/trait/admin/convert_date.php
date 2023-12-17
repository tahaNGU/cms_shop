<?php

namespace App\trait\admin;

use Morilog\Jalali\Jalalian;

trait convert_date
{
    public function convert_date_to_timestamp($date){
        $date_birth=explode('/',$date);
        $date = (new Jalalian($date_birth[2], $date_birth[1], $date_birth[0], 0, 0, 0))->getTimestamp();
        return $date;
    }
}
