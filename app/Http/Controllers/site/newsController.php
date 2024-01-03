<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\article;
use Illuminate\Http\Request;

class newsController extends Controller
{
    public function index(){
        $article=article::where('state','1')->where('show_time_date','<=',time())->orderBy('order','desc')->paginate(10);
        return view('site.news',compact('article'));
    }
    public function news_info(article $article){
        $related_article=[];
        if(!empty($article['popular_article'])){
            $related_article=article::whereIn('id',[$article['popular_article']])->where('state','1')->orderBy('order','desc')->get();
        }
        return view('site.news_info',compact('article','related_article'));
    }
}
