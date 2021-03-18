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

class RouteRedirectAfterChangePasswordController extends Controller
{
    public function index(){
        if(Auth::user()->role==FacadesUser::ENCODER)
        {
            return redirect(route('pre.index'));
        }

        if(Auth::user()->role==FacadesUser::ADMIN)
        {
            return redirect(route('reports.admin'));
        }

        if(Auth::user()->role==FacadesUser::SUPER_ADMIN)
        {
            return redirect(route('reports.superadmin'));
        }

        return redirect(route('person.register'));
    }
}
