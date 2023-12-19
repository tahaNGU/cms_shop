<?php

namespace App\Models;

use App\trait\admin\admin_convert;
use App\trait\admin\convert_Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory,convert_Verta,admin_convert;
    protected $guarded=[];

    public function product_cat(){
        return $this->belongsTo(product_cat::class,'category_id');
    }
    public function product_tag(){
        return $this->belongsToMany(tag::class,'product_tag');
    }

    public function product_variation(){
        return $this->hasMany(product_variation::class,'product_id');
    }

}
