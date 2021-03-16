<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Facades\Security;
use App\Classes\Facades\User as FacadesUser;
use App\Models\User;
use App\Models\Person;
use Illuminate\Support\Facades\Auth;

class PreRegisteredController extends Controller
{
    public function index()
    {
        Auth::user()->allowIf(FacadesUser::ADMIN);
        return view('pages.encoder.pre-registered-lists');
    }

    public function show($id)
    {}
}
