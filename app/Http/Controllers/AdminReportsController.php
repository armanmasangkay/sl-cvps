<?php

namespace App\Http\Controllers;

use App\Classes\Facades\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Facility;
use App\Models\Municipality;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class AdminReportsController extends Controller
{
    public function index()
    {
        Auth::user()->allowIf(User::ADMIN);
        return view('pages.admin.reports');
    }
}
