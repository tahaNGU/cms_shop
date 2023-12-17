<?php

namespace App\Models;

use App\trait\admin\admin_convert;
use App\trait\admin\convert_verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    use HasFactory,convert_verta,admin_convert;
    protected $guarded=[];
    protected $appends = ['pic_site'];
    protected $table='banner';


    public function getPicSiteAttribute(){
        return "images/".$this->pic;
    }



}
