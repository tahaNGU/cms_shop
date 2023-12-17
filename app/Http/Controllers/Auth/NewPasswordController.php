<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'otpcode'=>  ['required','exists:user,otpcode'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'mobile'=>['required']
        ],['mobile.exists'=>'خطایی در انجام عملیات ایجاد شده']);

        try {
            $user=User::where('mobile',Crypt::decrypt($request->mobile))->where('otpcode',$request->otpcode)->first();
        }
        catch (\Exception $exception){
            abort(404);
        }
        if ($user['expire_otp'] <= time()) {
            return back()->with('error', 'کد فعالسازی شما منقضی شده');
        }
        $user->update([
            'password'=>Hash::make($request->password)
        ]);
        return redirect()->route('login')->with('error','رمز عبور شما تغییر کرد');
    }
}
