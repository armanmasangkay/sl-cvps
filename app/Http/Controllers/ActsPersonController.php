<?php

namespace App\Http\Controllers;

use App\Models\ActsPerson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActsPersonController extends Controller
{
    public function index()
    {
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
        $validator = $this->checkRequest($request->all());

        if($validator->fails())
        {
            return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
        }

        if(!$this->findMatchQrCode($request->qrcode_number))
        {
            return response()->json(['status' => 'error', 'errors' => 'No Qr Code match']);
        }

        return redirect(route('qr.sample'))->json(['status' => 'success', 'data' => ActsPerson::where('qr_code', $request->qrcode_number)->get()]);

    }
}
