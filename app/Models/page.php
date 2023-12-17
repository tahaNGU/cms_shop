<?php

namespace App\Models;

use App\trait\admin\admin_convert;
use App\trait\admin\convert_Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class page extends Model
{
    use HasFactory,convert_Verta,admin_convert;
    protected $guarded=[];
    public function admin(){
        return $this->belongsTo(admins::class,'admin_id');
    }

    public function content(){
        return $this->morphMany('App\\Models\\content','content');
    }
}
