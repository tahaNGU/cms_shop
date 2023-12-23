<?php

namespace App\Models;

use App\trait\admin\convert_Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attribiute extends Model
{
    use HasFactory,convert_Verta;

    protected $guarded=[];
    protected $table="attributes";


    public function categories(){
        return $this->belongsToMany(product_cat::class,'attribute_category');
    }

    public function value(){
        return $this->hasMany(product_attribute::class,'attribute_id')->select('attribute_id','value')->distinct();
    }

    public function variationValue(){
        return $this->hasMany(product_variation::class,'attribute_id')->select('attribute_id','value')->distinct('value');
    }
}
