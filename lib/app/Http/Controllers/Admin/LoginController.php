<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('backend.login');
    }
    public function postLogin(LoginRequest $request)
    {
        $arr = ['email' => $request-> email, 'password'=> $request-> password];
        if($request->remember == 'Remember Me') {
            $remember = true;
        } else {
            $remember = false;
        }
        if(Auth::attempt($arr, $remember)) {
            if (auth()->user()->level == 1) {
                return redirect()->intended('admin/home')->with('success', 'Login successful!');
            } else {
                return redirect()->intended('/')->with('success', 'Login successful!');
            }
        } else {
            return back()->withInput()->with('error', 'Incorrect username or password');
        }
    }
}
