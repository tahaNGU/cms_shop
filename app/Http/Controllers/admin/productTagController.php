<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class productTagController extends Controller
{
    public function store($tags,$product_id){
        $product=product::find($product_id);
        foreach ($tags as $key => $value) {
            $product->product_tag()->attach($value);
        }
    }

    public function change($tags,$product_id){
        $product=product::find($product_id);
        $product->product_tag()->detach();
        foreach ($tags as $key => $value) {
            $product->product_tag()->attach($value);
        }
    }
}
