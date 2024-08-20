<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
