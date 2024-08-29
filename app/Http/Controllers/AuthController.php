<?php

namespace App\Http\Controllers;

use App\Mail\forgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => "required"
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('cart.showCart'));
        }
        return redirect()->route('login')->with('error', 'email/password incorrect');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('login')->with('success', 'account created successfully');
    }


    public function forgotPassword()
    {
        return view('auth.forgetPassword');
    }

    public function forgotPasswordPost(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:users'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->remember_token = Str::random(40);
            $user->save();
            // php artisan make:mail (mailname)
            Mail::to($user->email)->send(new forgotPasswordMail($user));
            return redirect()->back()->with('success', 'please check your email and reset your password');
        };
    }

    public function reset($token)
    {
        $user = User::where('remember_token', $token)->first();
        if ($user) {
            // $data['user'] = $user;
            return view('auth.reset');
        } else {
            abort(404);
        }
    }

    public function resetPost(Request $request)
    {
        $rule = [
            'email' => 'required|email:exists:users',
            'newPassword' => 'required|confirmed',
        ];

        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // $user =
    }



    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
