<?php

namespace App\Models;

use App\trait\admin\admin_convert;
use App\trait\admin\convert_Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group_access__type extends Model
{
    use HasFactory,convert_Verta,admin_convert;
    protected $guarded=[];
    protected $appends=['group_access_types'];
    public function getGroupAccessTypesAttribute(){
        $convert_arr=[];

        foreach (json_decode($this->module_access) as $key => $value) {
            $convert_arr[]=$key;
        }
        return $convert_arr;
    }
}
