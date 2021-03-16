<?php

namespace App\Http\Controllers;

use App\Classes\Facades\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserLogin extends Controller
{
    public function view()
    {
        return view('pages.login');
    }

    private function redirectUserWith($role)
    {
       if($role==User::ADMIN){
            return redirect(route('reports.admin'));
       }

       if($role==User::SUPER_ADMIN){
        return redirect(route('reports.superadmin'));
        }

        if($role==User::ENCODER){
            return redirect(route('encoder.post-vax'));
        }
    }

    public function authenticate(Request $request)
    {
        $credentials=$request->only(['username','password','role']);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return $this->redirectUserWith(Auth::user()->role);
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

}
