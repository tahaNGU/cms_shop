<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Models\admins;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('admin.auth.register');
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
            'user_name' => ['required', 'string','unique:'.admins::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = admins::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'user_name' => $request->user_name,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::guard('admins')->login($user);

        return redirect(RouteServiceProvider::HOME_ADMIN);
    }
}
