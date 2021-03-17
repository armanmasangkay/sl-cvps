<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Vaccinator;
use App\Models\Vaccine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostVaxController extends Controller
{
    private function abortIfPersonHasNoQr(Person $person)
    {
        if(!$person->hasQrCode()){
            abort('500');
        }
    }

    private function getVaccinators()
    {
        return Vaccinator::where('municipality_id',Auth::user()->municipality_id)->get();
    }


    public function index(Person $person)
    {
        $this->abortIfPersonHasNoQr($person);

        $vaccinators=$this->getVaccinators();

        $vaccines=Vaccine::where('municipality_id',Auth::user()->municipality_id)->get();

        return view('pages.encoder.new-data',[
            'person'=>$person,
            'vaccinators'=>$vaccinators,
            'vaccines'=>$vaccines
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
