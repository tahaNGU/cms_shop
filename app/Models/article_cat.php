<?php

namespace App\Models;

use App\trait\admin\convert_Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article_cat extends Model
{
    use HasFactory,convert_Verta;
    protected $guarded=[];

    public function sub_cats(){
        return $this->hasMany(article_cat::class,'parent_id');
    }
}
