<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\article_cat_edit_request;
use App\Http\Requests\admin\article_cat_request;
use App\Models\article_cat;
use App\trait\admin\action_items;

class articleCatController extends Controller
{
    use action_items;
    public function create()
    {
        $redirect_kinds = __('seo.redirect_kinds');
        $index_type = __('seo.index_type');
        $news_cats = article_cat::where('parent_id', '0')->get();
        return view('admin.article_cat.create', compact('redirect_kinds', 'index_type', 'news_cats'));
    }

    public function store(article_cat_request $request)
    {
        article_cat::create([
            'canonical' => $request->canonical,
            'redirect' => $request->redirect,
            'redirect_kind' => $request->redirect_kind,
            'robots' => $request->robots,
            'url_seo' => str_replace(' ', '-', $request->url_seo),
            'title_seo' => $request->title_seo,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'title' => $request->title,
            'parent_id' => $request->parent_id,
        ]);
        return back()->with('success', __('alert_msg.success_submit'));

    }

    public function index()
    {
        $parent_id="0";
        if (request()->has("parent_id")){
            $parent_id=request()->get("parent_id");
        }
        $article_cats = article_cat::where('parent_id', $parent_id)->get();
        return view('admin.article_cat.list', compact('article_cats'));
    }

    public function delete($id)
    {
        article_cat::find($id)->delete();
        return back()->with('error', __('alert_msg.success_delete'));
    }

    public function edit($article){
        $article=article_cat::find($article);
        $news_cats = article_cat::where('parent_id', '0')->get();

        $redirect_kinds = __('seo.redirect_kinds');
        $index_type = __('seo.index_type');
        $kind_open = __('common.kind_open');
        return view('admin.article_cat.edit', compact('article', 'kind_open','redirect_kinds','index_type','news_cats'));
    }
    public function update(article_cat_edit_request $request,$id){
        article_cat::find($id)->update([
            'canonical' => $request->canonical,
            'redirect' => $request->redirect,
            'redirect_kind' => $request->redirect_kind,
            'robots' => $request->robots,
            'url_seo' => str_replace(' ', '-', $request->url_seo),
            'title_seo' => $request->title_seo,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'title' => $request->title,
            'parent_id' => $request->parent_id,
        ]);
        return back()->with('success', __('alert_msg.success_submit'));

    }

    public function action_items()
    {
        if (isset($_POST['check_item'][0])) {
            return back()->with('error', $this->action_items_list($_POST['action_type'], article_cat::class,false, $_POST['check_item'], $_POST["order"]));

        } else {
            return back()->with('error', __('alert_msg.empty_items'));

        }
    }
}
