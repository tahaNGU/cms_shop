<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\admin\brand;
use App\Models\content;
use App\Models\product;
use App\Models\product_cat;
use App\Models\product_variation;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index(Request $request,$product_cat=''){
        $product_attribute=[];
        $product_variation=[];

        $products=product::where('is_active','1')->filter()->simplePaginate(2);
        if(isset($product_cat) && !empty($product_cat)){
            $product_cat=product_cat::where('url_seo',$product_cat)->first();
            $product_attribute=$product_cat->categories()->where('is_filter','1')->with('value')->get();
            $product_variation=$product_cat->categories()->where('is_filter','1')->with('variationValue')->get();
            $products=$product_cat->product()->where('is_active','1')->filter()->simplePaginate(2);
        }
        $brands=brand::where('state','1')->get();
        $product_cats=product_cat::where('state','1')->get();
        return view('site.products',compact('products','brands','product_cats','product_attribute','product_variation'));
    }


    public function product(product $product){
        $related_product=[];
        if(!empty($product['product_related'])){
            $related_product=product::whereIn('id',explode(',',$product['product_related']))->where('is_active','1')->get();
        }
        return view('site.product',compact('product','related_product'));
    }
}
