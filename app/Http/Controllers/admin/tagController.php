<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\tag;
use App\trait\admin\action_items;
use Illuminate\Http\Request;

class tagController extends Controller
{
    use action_items;
    public function create(){
        return view('admin.tag.create');
    }
    public function store(Request $request){
        $request->validate([
            'title'=>'required'
        ]);
        tag::create([
            'title'=>$request->title,
            'admin_id'=>auth()->user()->id
        ]);
        return back()->with('success', __('alert_msg.success_submit'));

    }

    public function list(){
        $tags=tag::all();
        return view('admin.tag.list',compact('tags'));
    }

    public function action_items(Request $request)
    {
        if (isset($request->check_item)) {
            return back()->with('error', $this->action_items_list($request->action_type, tag::class, false, $request->check_item, $request->order));

        } else {
            return back()->with('error', __('alert_msg.empty_items'));

        }
    }
    public function delete($id){
        tag::find($id)->delete();
        return back()->with('error', __('alert_msg.success_delete'));
    }
    public function edit($id){
        $tag=tag::find($id);
        return view('admin.tag.edit',compact('tag'));
    }
    public function update(Request $request,$id){
        $request->validate([
            'title'=>'required'
        ]);
        tag::find($id)->update([
            'title'=>$request->title,
        ]);
        return back()->with('success', __('alert_msg.success_submit'));

    }
}
