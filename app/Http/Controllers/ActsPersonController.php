<?php

namespace App\Http\Controllers;

use App\Classes\Facades\User;
use App\Models\ActsPerson;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ActsPersonController extends Controller
{
    public function index()
    {
    
        $actsperson = ActsPerson::take(5)->get();
        return $actsperson;
    }

    private function checkRequest($data)
    {
        return Validator::make($data,[
            'person_id'     => 'required',
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

        return response()->json(['status' => 'success', 'data' => ['person' => Person::find($request->person_id), 'actsperson' => ActsPerson::where('qr_code', $request->qrcode_number)->get()]]);


    }

    public function apidata(Request $request)
    {
        redirect(route('qr.detail'))
            ->with('status', true)
            ->with('actsperson', $request->actsperson)
            ->with('person', $request->person);
    }

    public function details()
    {
        if(!session('status'))
        {
            return redirect(route('pre.index'));
        }

        $actspersondatas = session('actsperson');
        $persondatas = session('person');


        // return $actspersondatas;
        // return $persondatas;

        return view('pages.encoder.person-detail', [
            'status' => session('status'),
            'actspersondatas' => $actspersondatas,
            'persondatas' => $persondatas
        ]);
    }


}
