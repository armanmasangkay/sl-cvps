<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserLogin extends Controller
{
    public function view()
    {
        return view('pages.login');
    }

    public function authenticate(Request $request)
    {
        $credentials=$request->only(['username','password','role']);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

}
