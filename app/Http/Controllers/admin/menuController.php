<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\menu_request;
use App\Models\menu;
use App\trait\admin\action_items;
use Illuminate\Http\Request;

class menuController extends Controller
{
    use action_items;
    public function create(){

        $menu_type=__('common.menu_type');
        $kind_open=__('common.kind_open');
        $states=__('common.state');
        $menu=menu::where('parent_id','0')->get();
        return view('admin.menu.create',compact('menu_type','kind_open','states','menu'));
    }

    public function store(menu_request $request){
        menu::create([
            'title'=>$request->title,
            'address'=>$request->address,
            'menu_type'=>$request->menu_type,
            'kind_open'=>$request->kind_open,
            'admin_id'=>auth()->user()->id,
            'parent_id'=>$request->parent_id,
        ]);
        return back()->with('success', __('alert_msg.success_submit'));
    }

    public function list(){
        $parent_id='0';
        if(request()->has('parent_id')){
            $parent_id=request()->get('parent_id');
        }
        $menu=menu::where('parent_id',$parent_id)->get();
        return view('admin.menu.list',compact('menu'));
    }
    public function action_items(Request $request)
    {
        if (isset($request->check_item)) {
            return back()->with('error', $this->action_items_list($_POST['action_type'], menu::class, true, $request->check_item, $request->order));

        } else {
            return back()->with('error', __('alert_msg.empty_items'));

        }
    }
    public function delete($id)
    {
        menu::find($id)->where('parent_id',$id)->update(['parent_id'=>'0']);

        menu::find($id)->delete();
        return back()->with('error', __('alert_msg.success_delete'));
    }

    public function edit($id){
        $menu_type=__('common.menu_type');
        $kind_open=__('common.kind_open');
        $states=__('common.state');
        $menu=menu::find($id);
        $menus=menu::where('parent_id','0')->where('id','!=',$id)->get();
        return view('admin.menu.edit',compact('menu_type','kind_open','states','menus','menu'));
    }
    public function update(menu_request $request,$id){
        menu::find($id)->update([
            'title'=>$request->title,
            'address'=>$request->address,
            'menu_type'=>$request->menu_type,
            'kind_open'=>$request->kind_open,
            'admin_id'=>auth()->user()->id,
            'parent_id'=>$request->parent_id,
        ]);
        return back()->with('success', __('alert_msg.success_submit'));
    }
}
