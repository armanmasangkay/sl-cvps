<?php

namespace App\Http\Controllers;

use App\Classes\Facades\User;
use App\Models\ActsPerson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ActsPersonController extends Controller
{
    public function index()
    {
        Auth::user()->allowIf(User::ENCODER);
        $actsperson = ActsPerson::all();
        return $actsperson;
    }

    private function checkRequest($data)
    {
        return Validator::make($data,[
            'qrcode_number' => 'required'
        ]);
    }

    private function findMatchQrCode($qrcode)
    {
        return ActsPerson::where('qr_code', '=', $qrcode)->exists();
    }

    public function checkQrCode(Request $request)
    {
        Auth::user()->allowIf(User::ENCODER);
        
        $validator = $this->checkRequest($request->all());

        if($validator->fails())
        {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
        }

        if(!$this->findMatchQrCode($request->qrcode_number))
        {
            return response()->json(['status' => 'error', 'errors' => "No QR Code Matched"]);
        }

        return redirect(route('qr.sample'))->json(['status' => 'success', 'data' => ActsPerson::where('qr_code', $request->qrcode_number)->get()]);

    }
}
