<?php

namespace App\Models;

use App\trait\admin\admin_convert;
use App\trait\admin\convert_Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory,convert_Verta,admin_convert;
    protected $guarded=[];
    public function sub_cats(){
        return $this->hasMany(menu::class,'parent_id')->where('state','1')->orderBy('order');
    }

}
