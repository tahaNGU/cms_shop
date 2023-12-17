<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\product_attribute;

class product_attribute_controller extends Controller
{
    public function store($attributes, $product_id)
    {
        foreach ($attributes as $key => $value) {
            product_attribute::create([
                'attribute_id'=>$key,
                'product_id'=>$product_id,
                'value'=>$value
            ]);
        }
    }
    public function change($attributes, $product_id){
        product_attribute::where('product_id',$product_id)->delete();
        foreach ($attributes as $key => $value) {
            product_attribute::create([
                'attribute_id'=>$key,
                'product_id'=>$product_id,
                'value'=>$value
            ]);
        }
    }
}
