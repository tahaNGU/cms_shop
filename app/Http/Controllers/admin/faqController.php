<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\faq_request;
use App\Models\faq;
use App\trait\admin\action_items;
use Illuminate\Http\Request;

class faqController extends Controller
{
    use action_items;
    public function create(){
        return view('admin.faq.create');
    }
    public function store(faq_request $request){
        faq::create([
            'question'=>$request->question,
            'answer'=>$request->answer,
            'admin_id'=>auth()->user()->id,
        ]);
        return back()->with('success', __('alert_msg.success_submit'));
    }

    public function edit($id){
        $faq=faq::find($id);
        return view('admin.faq.edit',compact('faq'));
    }
    public function update(faq_request $request,$id){
        faq::find($id)->update([
            'question'=>$request->question,
            'answer'=>$request->answer
        ]);
        return back()->with('success', __('alert_msg.success_submit'));
    }
    public function delete($id)
    {
        faq::find($id)->delete();
        return back()->with('error', __('alert_msg.success_delete'));
    }
    public function action_items(Request $request)
    {
        if (isset($request->check_item)) {
            return back()->with('error', $this->action_items_list($_POST['action_type'], faq::class, false, $request->check_item, $request->order));

        } else {
            return back()->with('error', __('alert_msg.empty_items'));

        }
    }
    public function list()
    {
        $faq = faq::all();
        return view('admin.faq.list', compact('faq'));
    }


}
