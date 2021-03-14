<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\VaccinatorRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VaccinatorController extends Controller
{
    private $vaccinatorRepository;

    public function __construct(VaccinatorRepositoryInterface $vaccinatorRepository)
    {  
       $this->vaccinatorRepository=$vaccinatorRepository; 
    }
    public function create()
    {
        return view('pages.admin.vaccinator-registration');
    }

    private function createVaccinatorValidator($data)
    {
       return Validator::make($data,[
            'firstname'=>'required',
            'lastname'=>'required',
            'position'=>'required',
            'role'=>'required',
            'facility'=>'required',
            'prc'=>'required'
        ]);
    }

    public function store(Request $request)
    {
        $validator=$this->createVaccinatorValidator($request->all());

        if($validator->fails()){
            return redirect(route('vaccinator.create'))->withErrors($validator);
        }
        
        $this->vaccinatorRepository->store($request->all());

        return redirect(route('vaccinator.create'))->with([
            'created'=>true,
            'message'=>'Vaccinator successfully registered.'
        ]);
    }
}
