<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login()
    {
        //dd(Hash::make(123456));

        if (!empty(Auth::check()))
        {
            if (Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard');
            }
            if (Auth::user()->user_type == 2)
            {
                return redirect('teacher/dashboard');
            }
            if (Auth::user()->user_type == 3)
            {
                return redirect('student/dashboard');
            }
            if (Auth::user()->user_type == 4)
            {
                return redirect('parent/dashboard');
            }
//            return redirect('admin/dashboard');
        }

        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;

        if (Auth::attempt(['email' => $request->email,'password' => $request->password], $remember))
        {
            if (Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard');
            }
            if (Auth::user()->user_type == 2)
            {
                return redirect('teacher/dashboard');
            }
            if (Auth::user()->user_type == 3)
            {
                return redirect('student/dashboard');
            }
            if (Auth::user()->user_type == 4)
            {
                return redirect('parent/dashboard');
            }

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
