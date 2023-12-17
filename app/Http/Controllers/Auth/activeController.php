<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\ValidationException;

class activeController extends Controller
{
    public function active($encrypt_mobile)
    {
        try {
            User::where('mobile', Crypt::decrypt($encrypt_mobile))->first();

        }
        catch (\Exception $exception){
            abort(404);
        }
        return view('auth.active');
    }

    public function store(Request $request)
    {
        try {
            $user = User::where('mobile', Crypt::decrypt($request->mobile))->first();

        }
        catch (\Exception $exception){
            abort(404);
        }
        if ($user['expire_otp'] <= time()) {
            return back()->with('error', 'کد فعالسازی شما منقضی شده');
        }
        if ($user['otpcode'] == $request->otpcode) {
            Auth::login($user);
        }
        else{
            return back()->with('error', 'کد فعالسازی اشتباه است');

        }
        $user->update([
            'user_verify' => Carbon::now()
        ]);

        return redirect()->route('main');

    }
    public function active_ajax(Request $request){
        $msg=[];
        try {
            $user = User::where('mobile', Crypt::decrypt($request->mobile))->first();
        }
        catch (\Exception $exception){
            $msg['error']="مشکلی در ارسال دیتا وجود دارد";
            echo json_encode($msg);
            exit();
        }
        $user->update([
            'otpcode' => rand(1000,9000),
            'expire_otp' =>strtotime('+3 minutes'),
        ]);
        $msg['success']="پیامک دوباره برای شما ارسال شد";
        echo json_encode($msg);
        exit();
    }

}
