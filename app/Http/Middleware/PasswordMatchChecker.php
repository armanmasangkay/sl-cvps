<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PasswordMatchChecker
{

    private function passwordCheck($password, $confirm_password)
    {
       if($password !== $confirm_password)
       {
           return true;
       }
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if($this->passwordCheck($request->password, $request->confirm_password))
        {
            return redirect(route('admin.create'))->with([
                    'matched'  => false,
                    'title'    => 'Warning!',
                    'text' => 'Password does not match'
            ])->withInput();
        }
        return $next($request);
    }
}
