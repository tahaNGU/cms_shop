<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\article_request;
use App\Http\Requests\admin\article_request_edit;
use App\Models\article;
use App\Models\article_cat;
use App\trait\admin\action_items;
use App\trait\admin\convert_date;
use App\trait\admin\image_resize;
use Image;

class article_controller extends Controller
{
    use image_resize, convert_date, action_items;

    public function create()
    {
        $redirect_kinds = __('seo.redirect_kinds');
        $index_type = __('seo.index_type');
        $article_cats = article_cat::where('parent_id', '0')->get();
        $articles = article::get();

        return view('admin.article.create', compact('redirect_kinds', 'index_type', 'article_cats', 'articles'));
    }

    public function store(article_request $request)
    {
        $pic = 'news/' . time() . '.' . $request->pic->extension();
        $request->pic->move(public_path('images/news'), $pic);

        $popular_article = '';
        if (isset($request->popular_article)) {
            $popular_article = implode(',', $request->popular_article);
        }
        article::create([
            'canonical' => $request->canonical,
            'redirect' => $request->redirect,
            'redirect_kind' => $request->redirect_kind,
            'robots' => $request->robots,
            'url_seo' => str_replace(' ', '-', $request->url_seo),
            'title_seo' => $request->title_seo,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'popular_article' => $popular_article,
            'title' => $request->title,
            'h1' => $request->h1,
            'show_time_date' => $this->convert_date_to_timestamp($request->show_time_date),
            'pic' => $pic,
            'admin_id' => auth()->user()->id,
            'alt_pic' => $request->alt_pic,
            'cat_id' => $request->cat_id,
            'state' => $request->state,
            'short_note' => $request->short_note,
            'long_note' => $request->long_note,
        ]);
        return back()->with('success', __('alert_msg.success_submit'));

    }

    public function delete($id)
    {
        article::find($id)->delete();
        return back()->with('error', __('alert_msg.success_delete'));
    }

    public function action_items()
    {
        if (isset($_POST['check_item'][0])) {
            return back()->with('error', $this->action_items_list($_POST['action_type'], article::class, false, $_POST['check_item'], $_POST["order"]));

        } else {
            return back()->with('error', __('alert_msg.empty_items'));

        }
    }

    public function index()
    {
        $articles = article::all();
        return view('admin.article.list', compact('articles'));
    }


    public function edit($id)
    {
        $article = article::find($id);
        $redirect_kinds = __('seo.redirect_kinds');
        $index_type = __('seo.index_type');
        $article_cats = article_cat::where('parent_id', '0')->get();
        $articles = article::where('id', '!=', $id)->get();
        return view('admin.article.edit', compact('article', 'redirect_kinds', 'index_type', 'article_cats', 'articles'));
    }

    public function update(article_request_edit $request, $id)
    {
        $pic='';
        if ($request->has('upload_value_pic')) {
            $pic=$request->get('upload_value_pic');

            if ($request->has('pic')) {
                if (is_object($request->pic)) {
                    $pic = 'news/' . time() . '.' . $request->pic->extension();
                    $request->pic->move(public_path('images/news'), $pic);
                }
            }
        }
        else{
            if ($request->has('pic')) {
                if (is_object($request->pic)) {
                    $pic = 'news/' . time() . '.' . $request->pic->extension();
                    $request->pic->move(public_path('images/news'), $pic);
                }
            }
        }

        $popular_article = '';
        if (isset($request->popular_article)) {
            $popular_article = implode(',', $request->popular_article);
        }
        article::find($id)->update([
            'canonical' => $request->canonical,
            'redirect' => $request->redirect,
            'redirect_kind' => $request->redirect_kind,
            'robots' => $request->robots,
            'url_seo' => str_replace(' ', '-', $request->url_seo),
            'title_seo' => $request->title_seo,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'title' => $request->title,
            'h1' => $request->h1,
            'show_time_date' => $this->convert_date_to_timestamp($request->show_time_date),
            'pic' => $pic,
            'popular_article' => $popular_article,

            'alt_pic' => $request->alt_pic,
            'cat_id' => $request->cat_id,
            'state' => $request->state,
            'short_note' => $request->short_note,
            'long_note' => $request->long_note,
        ]);
        return back()->with('success', __('alert_msg.success_submit'));

    }


}
