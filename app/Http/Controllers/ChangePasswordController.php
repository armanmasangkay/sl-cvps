<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChangePassword;
use App\Classes\Facades\Security;
use App\Classes\Facades\User as FacadesUser;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    public function index()
    {
        return view('pages.change.password');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'password'              =>      'required|min:4',
            'confirm_password'      =>      'required',
        ]);

        if($validator->fails())
        {
            return redirect(route('change-password.index'))->with([
                'updated' => false,
                'title'   => 'Warning!',
                'text'    => 'Password must be atleast 4 character in length!'
            ])->withInput();
        }

        if($request->password !== $request->confirm_password)
        {
            return redirect(route('change-password.index'))->with([
                'matched' => false,
                'title'   => 'Warning!',
                'text'    => 'Password did not matched!'
            ]);
        }

        $user = User::find($request->user_id);
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect(route('change-password.index'))->with([
            'updated' => true,
            'title'   => 'Great!',
            'text'    => 'Password was changed successfully!'
        ]);
    }

    public function show()
    {}
}
