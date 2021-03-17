<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Facades\Security;
use App\Classes\Facades\User as FacadesUser;
use App\Classes\Facades\User;
use App\Models\ActsPerson;
use App\Models\Person;
use Illuminate\Support\Facades\Auth;

class PreRegisteredController extends Controller
{
    public function index()
    {
        Auth::user()->allowIf(User::ENCODER);

        return view('pages.encoder.pre-registered-lists',[
                'persons' => Person::paginate(5)
            ]);
    }

    public function show($id)
    {

    }
}
