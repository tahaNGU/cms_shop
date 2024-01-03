<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class panelController extends Controller
{
    public function index(){
        return view('site.user.panel');
    }
    public function user_profile_information(){
        return view('site.user.user_profile_information');
    }
    public function user_complete_information(Request $request){
        $request->validate([
            'name'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'address_site'=>'required',

        ]);
        User::find(Auth::user()->id)->update([
            'name'=>$request->name,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'panel_name'=>$request->panel_name,
            'address_site'=>$request->address_site,
        ]);
        return back()->with('success','اطلاعات شما با موفقیت تغییر کرد.');
    }
}
