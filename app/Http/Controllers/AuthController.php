<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
class AuthController extends Controller
{
    public function login()
    {
        //dd(Hash::make(123456));

        if (!empty(Auth::check()))
        {
            return redirect('admin/dashboard');
        }

        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;

        if (Auth::attempt(['email' => $request->email,'password' => $request->password], $remember))
        {
            return redirect('admin/dashboard');
        }else
        {
            return redirect()->back()->with('danger','Please Enter Correct Email and Password');
        }
    }

    public function AuthLogout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
