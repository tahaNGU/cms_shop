<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\banner_edit_request;
use App\Http\Requests\admin\banner_request;
use App\Models\banner;
use App\trait\admin\action_items;

class banner_controller extends Controller
{
    use action_items;

    public function create()
    {
        $banner_types = __('common.banner_type');
        $kind_open = __('common.kind_open');
        return view('admin.banner.create', compact('banner_types', 'kind_open'));
    }

    public function store(banner_request $request)
    {
        $filename = time() . '.' . $request->pic->getClientOriginalExtension();
        request()->pic->move(public_path('images'), $filename);
        banner::create([
            'title' => $request->title,
            'admin_id' => auth()->user()->id,
            'type_location' => $request->place,
            'type_open' => $request->kind_open,
            'pic' => $filename,
            'state' => '1',
            'order' => '0',
            'namespace' => 'rest'
        ]);
        return back()->with('success', __('alert_msg.success_submit'));
    }

    public function index()
    {
        $banners = banner::all();
        return view('admin.banner.list', compact('banners'));
    }

    public function delete($id)
    {
        banner::find($id)->delete();
        return back()->with('error', __('alert_msg.success_delete'));
    }
    public function edit($banner){
        $banner=banner::find($banner);
        $banner_types = __('common.banner_type');
        $kind_open = __('common.kind_open');
        return view('admin.banner.edit', compact('banner','banner_types', 'kind_open'));
    }
    public function update(banner_edit_request $request,$id){
        if (isset($request->upload_value_pic)){
            $filename = $request->upload_value_pic;

        }
        else{
            $filename = time() . '.' . $request->pic->getClientOriginalExtension();
            request()->pic->move(public_path('images'), $filename);

        }
        banner::find($id)->update([
            'title'=>$request->title,
            'pic'=>$filename,
            'namespace' => $request->address,
            'type_location' => $request->place,
            'type_open' => $request->kind_open,

        ]);
        return back()->with('success', __('alert_msg.success_submit'));
    }

    public function action_items()
    {
        if (isset($_POST['check_item'][0])) {

            return back()->with('error', $this->action_items_list($_POST['action_type'], banner::class,false, $_POST['check_item'], $_POST["order"]));

        } else {
            return back()->with('error', __('alert_msg.empty_items'));

        }
    }
}
