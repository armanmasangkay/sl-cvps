<?php

namespace App\Http\Controllers;

use App\Classes\Facades\User;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchPreRegistrationController extends Controller
{


    public function search(Request $request)
    {

        Auth::user()->allowIf(User::ENCODER);

        $persons=Person::where('firstname','like',"%{$request->firstname}%")
                        ->where('lastname','like',"%{$request->lastname}%")->paginate(5);

    
        return view('pages.encoder.pre-registered-lists',[
            'persons' =>$persons,
            'queryFirstname'=>$request->firstname,
            'queryLastname'=>$request->lastname
        ]);
        
    }
}
