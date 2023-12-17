<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\faq;
use Illuminate\Http\Request;

class faqController extends Controller
{
    public function index(Request $request){
        $faqs=faq::where('state','1')->orderBy('order','desc')->question($request->get('title'))->get();
        return view('site.faq',compact('faqs'));
    }
}
