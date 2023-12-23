<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\product;

class compareController extends Controller
{
    public function index($product_id){
        $product=product::find($product_id);
        return view('site.compare',compact('product'));
    }
}
