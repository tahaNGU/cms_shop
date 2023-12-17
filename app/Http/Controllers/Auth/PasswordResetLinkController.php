<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use mysql_xdevapi\Exception;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'user_name' => ['required', 'regex:/^09(1[0-9]|9[0-2]|2[0-2]|0[1-5]|41|3[0,3,5-9])\d{7}$/','exists:user,mobile'],
        ]);
        $user = User::where('mobile', $request->user_name)->first();
        $user->update([
            'otpcode' => rand(1000,9000),
            'expire_otp' =>strtotime('+3 minutes'),
        ]);
        return redirect()->route('password.reset',['mobile'=>Crypt::encrypt($user->mobile)]);
    }
}
