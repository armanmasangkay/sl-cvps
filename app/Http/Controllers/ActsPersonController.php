<?php

namespace App\Http\Controllers;

use App\Models\ActsPerson;
use Illuminate\Http\Request;

class ActsPersonController extends Controller
{
    public function index()
    {
        $actsperson = ActsPerson::all();
        return $actsperson;
    }

    public function checkQrCode(Request $request)
    {

    }
}
