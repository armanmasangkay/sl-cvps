<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Encoder;

class EncoderController extends Controller
{
    public function create()
    {
        return view('pages.admin.add-encoder', ['user' => 'Admin']);
    }

    private function passwordCheck($password, $confirm_password)
    {
        if($password !== $confirm_password)
        {
            return true;
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname'            =>      'required',
            'lastname'             =>      'required',
            'username'              =>      'required',
            'password'              =>      'required|min:4',
            'confirm'               =>      'required',
            'municipality'          =>      'required',
            'facility'              =>      'required',
        ]);

        if($validator->fails())
        {
            return redirect(route('encoder.create'))->withErrors($validator)->withInput();
        }

        if($this->passwordCheck($request->password, $request->confirm))
        {
            return redirect(route('encoder.create'))->with([
                    'matched'  => false,
                    'title'    => 'Warning!',
                    'text' => 'Password does not match'
                ])->withInput();
        }

        Encoder::create([
            'firstname'    =>      $request->firstname,
            'lastname'     =>      $request->lastname,
            'middlename'   =>      (!empty($request->middle_name) ? $request->middle_name : "N/A"),
            'suffix'       =>      (!empty($request->suffix) ? $request->suffix : "N/A"),
            'username'      =>     $request->username,
            'password'      =>     bcrypt($request->password),
            'municipality'  =>     $request->municipality,
            'facility'     =>      $request->facility,
        ]);

        return redirect(route('encoder.create'))->with([
                'registered' => true,
                'title'      => 'Great!',
                'text'       => 'New encoder was added'
            ]);
    }
}
