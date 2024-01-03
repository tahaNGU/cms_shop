<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\article;
use App\Models\banner;
use App\Models\contact;
use App\Models\page;
use App\Models\product;
use App\Models\product_cat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function main(){
        $banners=banner::where('state','1')->where('type_location','1')->orderBy('order','desc')->get();
        $banners_under_sell_product=banner::where('state','1')->where('type_location','2')->orderBy('order','desc')->first();
        $banners_under_new_product=banner::where('state','1')->where('type_location','3')->orderBy('order','desc')->get();


        $product_cat=product_cat::where('state','1')->where('state_main','1')->orderBy('order','desc')->get();
        $product_sell=product::where('is_active','1')->where('state_sell','1')->get(['title','id','primary_image','url_seo']);
        $product_new=product::where('is_active','1')->where('state_new','1')->get(['title','id','primary_image','url_seo']);

        $product_suggest=product::where('is_active','1')->where('state_suggest','1')->get(['title','id','primary_image','url_seo']);

        $articles=article::where('state','1')->where('state_main','1')->orderBy('order','desc')->get();
        return view('site.main',compact('banners','articles','product_suggest','product_cat','product_sell','banners_under_sell_product','product_new','banners_under_new_product'));
    }

    public function about(){
        $about=page::where('address','about_us')->where('state','1')->first();
        $content_about=collect($about->content()->where('state','1')->where('kind','3')->orderBy('order','desc')->limit(4)->get())->split(2);
        $content_about_photo=$about->content()->where('state','1')->where('kind','2')->orderBy('order','desc')->get();
        return view("site.about",compact('about','content_about','content_about_photo'));
    }

    public function contact(){
        return view('site.contact');
    }

    public function contact_store(Request $request){
        $request->validate([
            'title'=>'required',
            'msg'=>'required',
            'email'=>'required|email'
        ]);
        contact::create([
            'title'=>$request->title,
            'msg'=>$request->msg,
            'email'=>$request->email,
        ]);
        return back()->with('success', __('alert_msg.contact_submit'));
    }
}
