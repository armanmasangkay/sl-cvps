<?php

namespace App\Http\Controllers;

use App\Classes\Facades\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Facility;
use App\Models\Municipality;
use App\Models\PostVax;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class AdminReportsController extends Controller
{
    public function index()
    {
        Auth::user()->allowIf(User::ADMIN);
        $postvaxes = PostVax::all();

        $filteredpostvaxes = [];
        foreach($postvaxes as $postvax)
        {
            if($postvax->getVaccinatorMunicipality()->id === Auth::user()->municipality_id)
            {
                array_push($filteredpostvaxes, $postvax);
            }
        }

        return view('pages.admin.reports', ['vaccinateds' => $filteredpostvaxes]);
    }
}
