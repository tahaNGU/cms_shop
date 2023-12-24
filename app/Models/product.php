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

    public function product_attribiute(){
        return $this->hasMany(product_attribute::class,'product_id');
    }
    public function scopeFilter($query){
        if(request()->has('attribiute')){
            foreach(request()->attribiute as $attribute){
                $query->whereHas('product_attribiute',function ($query) use ($attribute){
                    foreach (explode('-',$attribute) as $index => $item) {
                        if($index==0){
                            $query->where('value',$item);
                        }
                        else{
                            $query->orWhere('value',$item);

                        }
                    }
                });
            }
        }
        if(request()->has('sortBy')){
            $sortBy=request()->sortBy;
            switch ($sortBy){
                case 'max':
                    $query->orderByDesc(
                        product_variation::select('price')->whereColumn('product_variation.product_id','products.id')->orderBy('price','asc')->take(1),
                    );
                break;
                case 'min':
                    $query->orderBy(
                        product_variation::select('price')->whereColumn('product_variation.product_id','products.id')->orderBy('price','asc')->take(1),
                    );

                break;
                case 'min':

                break;
                case 'latest':
                    $query->latest();
                break;
                case 'oldest':
                    $query->oldest();
                break;
                default:
                    $query;
                break;
            }
        }
        return $query;
    }

}
