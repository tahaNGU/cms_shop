<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\admin\brand;
use App\Models\product;
use App\Models\product_cat;
use App\Models\product_variation;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index($product_cat=''){
        $product_attribute=[];
        $product_variation=[];
        if(isset($product_cat) && !empty($product_cat)){
            $attributes=product_cat::where('url_seo',$product_cat)->first();
            $product_attribute=$attributes->categories()->where('is_filter','1')->with('value')->get();
            $product_variation=$attributes->categories()->where('is_filter','1')->with('variationValue')->get();
        }
        $products=product::where('is_active','1')->simplePaginate(2);
        $brands=brand::where('state','1')->get();
        $product_cats=product_cat::where('state','1')->get();
        return view('site.product',compact('products','brands','product_cats','product_attribute','product_variation'));
    }
}
