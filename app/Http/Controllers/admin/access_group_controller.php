<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\access_group_type_request;
use App\Models\admin\group_access;
use App\Models\group_access__type;
use App\trait\admin\action_items;
use Illuminate\Http\Request;

class access_group_controller extends Controller
{
    use action_items;
    public function create(){
        $group_access=self::group_access();
        return view('admin.group_access.group_access_create',compact('group_access'));
    }

    public function store(access_group_type_request $request){

        group_access__type::create([
            'title'=>$request->title,
            'module_access'=>json_encode($request->module_access),
            'admin_id'=>auth()->user()->id,
        ]);
        return back()->with('success', __('alert_msg.success_submit'));

    }
    public function list(){
        $group_access_types=group_access__type::get();
        return view('admin.group_access.group_access_list',compact('group_access_types'));
    }
    public function edit($id){
        $group_access=self::group_access();
        $group_access_type_=group_access__type::find($id);
        return view('admin.group_access.group_access_edit',compact('group_access_type_','group_access'));

    }


    public function delete($id){
        group_access__type::find($id)->delete();
        return back()->with('error', __('alert_msg.success_delete'));
    }

    private function group_access(){
        $group_access=[];
        $access_name=group_access::all();
        foreach ($access_name as $item) {
            $group_access[$item['module']][]=$item['namespace'];
        }
        return $group_access;
    }

    public function update(access_group_type_request $request,$id){
        group_access__type::find($id)->update([
            'title'=>$request->title,
            'module_access'=>json_encode($request->module_access),
        ]);
        return back()->with('success', __('alert_msg.success_submit'));
    }
    public function action_items(Request $request)
    {
        if (isset($request->check_item)) {
            return back()->with('error', $this->action_items_list($_POST['action_type'], group_access__type::class, false, $request->check_item, $request->order));

        } else {
            return back()->with('error', __('alert_msg.empty_items'));

        }
    }
}
