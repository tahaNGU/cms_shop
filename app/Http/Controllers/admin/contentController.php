<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\admin_content_request;

use App\trait\admin\action_items;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;

class contentController extends Controller
{
    use action_items;
    public function create($item_id, $module){
        $redirect_kinds = __('seo.redirect_kinds');
        $index_type = __('seo.index_type');
        return view('admin.content.create',compact('item_id','module','redirect_kinds','index_type'));
    }
    public function store(admin_content_request $request,$module){
        $content_type="\App\Models\\$module"::find($request->item_id);
        $pic='';
        if ($request->has('pic')){
            $pic = 'content/'.time() . '.' . $request->pic->getClientOriginalExtension();
            request()->pic->move(public_path('images/content'), $pic);
        }
        $content_type->content()->create([
            'title'=>$request->title,
            'kind'=>$request->kind,
            'title2'=>$request->title2,
            'note'=>$request->long_note,
            'pic'=>$pic,
            'admin_id'=>auth()->user()->id,
        ]);
        return back()->with('success', __('alert_msg.success_submit'));
    }

    public function list($item_id, $module){
        $content_type="\App\Models\\$module"::find($item_id);
        $content=$content_type->content;
        return view('admin.content.list',compact('content','module','item_id'));
    }

    public function action_items(Request $request,$item_id, $module){
        if (isset($request->check_item)) {
            return back()->with('error', $this->action_items_list($request->action_type, \App\Models\content::class, false, $request->check_item, $request->order));

        } else {
            return back()->with('error', __('alert_msg.empty_items'));

        }
    }
    public function delete($id){
        \App\Models\content::find($id)->delete();
        return back()->with('error', __('alert_msg.success_delete'));
    }

    public function edit($module,$item_id){
        $content=\App\Models\content::find($item_id);
        return view('admin.content.edit',compact('content','module','item_id'));
    }

    public function update($module,$item_id,admin_content_request $request){
        if (isset($request->upload_value_pic)){
            $filename = $request->upload_value_pic;
        }
        else{
            $filename = 'content/'.time() . '.' . $request->pic->getClientOriginalExtension();
            request()->pic->move(public_path('images/content'), $filename);
        }
        \App\Models\content::find($item_id)->update([
            'title'=>$request->title,
            'kind'=>$request->kind,
            'title2'=>$request->title2,
            'note'=>$request->long_note,
            'pic'=>$filename,
        ]);
        return back()->with('success', __('alert_msg.success_submit'));

    }
}
