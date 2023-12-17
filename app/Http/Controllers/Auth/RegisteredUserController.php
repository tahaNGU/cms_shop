<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string','regex:/[0]{1}[0-9]{10}/'],
            'password' => ['required', Rules\Password::defaults()],
        ]);


        $user=User::where('mobile',$request->mobile);
        if($user->count()){
            return redirect()->route('login')->with('login_account',__('alert_msg.already_have_account'));
        }
        else{
            $user = User::create([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'mobile' => $request->mobile,
                'otpcode' => rand(1000,9000),
                'expire_otp' =>strtotime('+3 minutes'),
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('active.account',['mobile_decode'=>Crypt::encrypt($request->mobile)])->with('active_account',__('alert_msg.active_account'));
        }
    }
}
