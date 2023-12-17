<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\manager_request;
use App\Models\group_access__type;
use Illuminate\Http\Request;

class managerController extends Controller
{
    public function create(){
        $group_access_type=group_access__type::all();
        return view('admin.manager.create',compact('group_access_type'));
    }
    public function store(manager_request $request){

    }
}
