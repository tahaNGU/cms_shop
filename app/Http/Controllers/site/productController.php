<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\admin\brand;
use App\Models\product;
use App\Models\product_cat;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index(){
        $products=product::where('is_active','1')->simplePaginate(2);
        $brands=brand::where('state','1')->get();
        $product_cats=product_cat::where('state','1')->get();
        return view('site.product',compact('products','brands','product_cats'));
    }
}
