<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\brand_edit_request;
use App\Http\Requests\admin\brand_request;
use App\Models\admin\brand;
use App\trait\admin\action_items;
use Illuminate\Http\Request;

class brand_controller extends Controller
{
    use action_items;
    public function create(){
        $redirect_kinds = __('seo.redirect_kinds');
        $index_type = __('seo.index_type');
        return view('admin.brand.create',compact('redirect_kinds','index_type'));
    }

    public function store(brand_request $request){
        $pic = 'brand/' . time() . '.' . $request->pic->extension();
        $request->pic->move(public_path('images/brand'), $pic);
        brand::create([
            'canonical' => $request->canonical,
            'redirect' => $request->redirect,
            'redirect_kind' => $request->redirect_kind,
            'robots' => $request->robots,
            'url_seo' => str_replace(' ', '-', $request->url_seo),
            'title_seo' => $request->title_seo,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'title'=>$request->title,
            'pic'=>$pic,
            'h1'=>$request->h1,
            'admin_id'=>auth()->user()->id,
        ]);
        return back()->with('success', __('alert_msg.success_submit'));
    }
    public function list(){
        $brands=brand::all();
        return view('admin.brand.list',compact('brands'));
    }
    public function action_items(Request $request)
    {
        if (isset($request->check_item)) {
            return back()->with('error', $this->action_items_list($request->action_type, brand::class, false, $request->check_item, $request->order));

        } else {
            return back()->with('error', __('alert_msg.empty_items'));

        }
    }

    public function edit($id){
        $brand=brand::find($id);
        $redirect_kinds = __('seo.redirect_kinds');
        $index_type = __('seo.index_type');
        return view('admin.brand.edit',compact('brand','redirect_kinds','index_type'));
    }
    public function delete($id){
        brand::find($id)->delete();
        return back()->with('error', __('alert_msg.success_delete'));
    }

    public function update(brand_edit_request $request,$id){
        if ($request->has('upload_value_pic')) {
            $pic=$request->get('upload_value_pic');

            if ($request->has('pic')) {
                if (is_object($request->pic)) {
                    $pic = 'brand/' . time() . '.' . $request->pic->extension();
                    $request->pic->move(public_path('images/brand'), $pic);
                }
            }
        }
        else{
            if ($request->has('pic')) {
                if (is_object($request->pic)) {
                    $pic = 'brand/' . time() . '.' . $request->pic->extension();
                    $request->pic->move(public_path('images/brand'), $pic);
                }
            }
        }
        brand::find($id)->update([
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
            'pic' => $pic,

        ]);
        return back()->with('success', __('alert_msg.success_submit'));

    }
}
