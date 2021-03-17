<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class SearchPreRegistrationController extends Controller
{


    public function search(Request $request)
    {

        $persons=Person::where('firstname','like',"%{$request->firstname}%")
                        ->where('lastname','like',"%{$request->lastname}%")->paginate(5);

    
        return view('pages.encoder.pre-registered-lists',[
            'persons' =>$persons,
            'queryFirstname'=>$request->firstname,
            'queryLastname'=>$request->lastname
        ]);
        
    }
}
