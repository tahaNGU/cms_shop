<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\pag_edit_request;
use App\Http\Requests\admin\page_request;
use App\Models\page;
use App\trait\admin\action_items;
use App\trait\admin\get_file;
use App\trait\admin\image_resize;
use Illuminate\Http\Request;

class pageController extends Controller
{
    use image_resize, action_items, get_file;

    public function create()
    {
        $redirect_kinds = __('seo.redirect_kinds');
        $index_type = __('seo.index_type');
        return view('admin.page.create', compact('redirect_kinds', 'index_type'));
    }

    public function store(page_request $request)
    {

        $pic = 'pages/'.time() . '.' . $request->pic->extension();
        $request->pic->move(public_path('images/pages'), $pic);


        $video = 'pages/'.time() . '.' . $request->video->extension();
        $request->video->move(public_path('images/pages'), $video);


        page::create([
            'admin_id' => auth()->user()->id,
            'canonical' => $request->canonical,
            'redirect' => $request->redirect,
            'h1' => $request->h1,
            'redirect_kind' => $request->redirect_kind,
            'robots' => $request->robots,
            'url_seo' => str_replace(' ', '-', $request->url_seo),
            'title_seo' => $request->title_seo,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'title' => $request->title,
            'alt_pic' => $request->alt_pic,
            'pic' => $pic,
            'video' => $video,
            'address' => $request->address,
            'long_note' => $request->long_note,
        ]);
        return back()->with('success', __('alert_msg.success_submit'));

    }

    public function list()
    {
        $pages = page::all();
        return view('admin.page.list', compact('pages'));
    }

    public function delete($id)
    {
        page::find($id)->delete();
        return back()->with('error', __('alert_msg.success_delete'));
    }

    public function edit($id)
    {
        $page = page::find($id);
        $redirect_kinds = __('seo.redirect_kinds');
        $index_type = __('seo.index_type');
        return view('admin.page.edit', compact('page', 'redirect_kinds', 'index_type'));
    }

    public function update(pag_edit_request $request)
    {
        $pic = $request->upload_value_pic;
        $video = $request->upload_value_video;
        if ($request->has('pic')) {
            if (is_object($request->pic)) {
                $pic = 'pages/'.time() . '.' . $request->pic->extension();
                $request->pic->move(public_path('images/pages'), $pic);
            }
        }
        if ($request->has('video')) {

            if (is_object($request->video)) {
                $video = 'pages/'.time() . '.' . $request->video->extension();
                $request->video->move(public_path('images/pages'), $video);
            }
        }


        page::find($request->id)->update([
            'admin_id' => auth()->user()->id,
            'canonical' => $request->canonical,
            'redirect' => $request->redirect,
            'h1' => $request->h1,
            'redirect_kind' => $request->redirect_kind,
            'robots' => $request->robots,
            'url_seo' => str_replace(' ', '-', $request->url_seo),
            'title_seo' => $request->title_seo,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'title' => $request->title,
            'alt_pic' => $request->alt_pic,
            'pic' => $pic,
            'video' => $video,
            'address' => $request->address,
            'long_note' => $request->long_note,
        ]);
        return back()->with('success', __('alert_msg.success_submit'));

    }

    public function action_items(Request $request)
    {
        if (isset($request->check_item)) {
            return back()->with('error', $this->action_items_list($request->action_type, page::class, false, $request->check_item, $request->order));

        } else {
            return back()->with('error', __('alert_msg.empty_items'));

        }
    }
}
