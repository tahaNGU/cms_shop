<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\attribiute;
use App\Models\product_attribute;
use App\Models\product_cat;
use App\Models\product_variation;
use Illuminate\Http\Request;

class product_variation_controller extends Controller
{
    public function store($variations, $product_id,$category_id){
        for ($i=0;$i<count($variations['value']); $i++){
            product_variation::create([
                'attribute_id'=>product_cat::find($category_id)->categories()->wherePivot('is_variation','1')->first()->id,
                'product_id'=>$product_id,
                'value'=>$variations['value'][$i],
                'price'=>$variations['price'][$i],
                'discount'=>$variations['discount'][$i],
                'quantity'=>$variations['quantity'][$i],
                'sku'=>$variations['sku'][$i],
            ]);
        }
    }
    public function change($attributes, $product_id){
        product_variation::where('product_id',$product_id)->delete();
        foreach ($attributes as $key => $value) {
            product_variation::create([
                'attribute_id'=>$key,
                'product_id'=>$product_id,
                'value'=>$value
            ]);
        }
    }
}
