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
}
