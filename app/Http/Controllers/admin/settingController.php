<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\setting;
use Illuminate\Http\Request;

class settingController extends Controller
{
    public function setting(){
        return view('admin.setting.setting');
    }

    public function setting_store(Request $request){
        if(!empty($request->all())){
            foreach ($request->all() as $key => $value) {
                if($key != '_token'){
                    setting::updateOrCreate(['key'=>$key],[
                        'key'=>$key,
                        'value'=>$value
                    ]);
                }
            }
        }
        return back()->with('success', __('alert_msg.success_submit'));

    }
}
