<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function adminLoginPost(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if(Auth::user() && Auth::user()->is_admin == 1){
                return redirect()->intended(route('dashboardAdmin'));
            }
        };
        return redirect()->route('getLogin')->with('error', 'authentification failed');
    }

    public function register()
    {
        return view('admin.register');
    }

    public function adminRegisterPost(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users',
            'is_admin' => 'required',
            'password' => 'required|confirmed'
        ];

        $messages = [
            'password.confirmed' => 'Les mots de passe ne correspondent pas.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $request->is_admin,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('getLogin')->with('success', 'successfully created');
    }
}
