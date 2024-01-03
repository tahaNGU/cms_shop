<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\attribiute;
use App\trait\admin\action_items;
use Illuminate\Http\Request;

class attributeController extends Controller
{
    use action_items;

    public function create()
    {
        return view('admin.attributes.create');
    }

    public function store(Request $request)
    {

        $request->validate(['title' => 'required']);
        attribiute::create([
            'title' => $request->title,
            'admin_id' => auth()->user()->id
        ]);
        return back()->with('success', __('alert_msg.success_submit'));
    }

    public function list()
    {
        $attributes = attribiute::all();
        return view('admin.attributes.list', compact('attributes'));
    }

    public function action_items(Request $request)
    {
        if (isset($request->check_item)) {
            return back()->with('error', $this->action_items_list($request->action_type, attribiute::class, false, $request->check_item, $request->order));

        } else {
            return back()->with('error', __('alert_msg.empty_items'));

        }
    }
    public function delete($id){
        attribiute::find($id)->delete();
        return back()->with('error', __('alert_msg.success_delete'));
    }
    public function edit($id){
        $attribute=attribiute::find($id);

        return view('admin.attributes.edit',compact('attribute'));
    }

    public function update(Request $request,$id){
        $request->validate(['title' => 'required']);
        attribiute::find($id)->update([
            'title' => $request->title,
        ]);
        return back()->with('success', __('alert_msg.success_submit'));
    }
}
