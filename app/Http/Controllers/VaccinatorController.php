<?php

namespace App\Http\Controllers;

use App\Classes\Facades\User;
use App\Http\Requests\VaccinatorRequest;
use App\Classes\Facades\User as FacadesUser;
use App\Models\Facility;
use App\Models\Vaccinator;
use App\Repositories\Contracts\VaccinatorRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VaccinatorController extends Controller
{
    private $vaccinatorRepository;

    public function __construct(VaccinatorRepositoryInterface $vaccinatorRepository)
    {
       $this->vaccinatorRepository=$vaccinatorRepository;
    }

    public function index()
    {
        Auth::user()->allowIf(User::ADMIN);

        return view('pages.admin.lists.vaccinators-lists',['vaccinators' => Vaccinator::where('municipality_id', Auth()->user()->municipality_id)->get()]);
    }

    public function create()
    {
        Auth::user()->allowIf(User::ADMIN);
        $facilities = Facility::where('municipality_id', Auth::user()->municipality_id)->get();
        return view('pages.admin.vaccinator-registration', ['facilities' => $facilities]);
    }

    private function createVaccinatorValidator($data)
    {
       return Validator::make($data,[
            'firstname'=>'required',
            'lastname'=>'required',
            'position'=>'required',
            'role'=>'required',
            'facility_id'=>'required',
            'prc'=>'required',
            'municipality_id' => 'required'
        ]);
    }

    public function store(VaccinatorRequest $request)
    {
        Auth::user()->allowIf(User::ADMIN);
        $validator=$this->createVaccinatorValidator($request->validated());

        if($validator->fails()){
            dd($validator->errors());
            return redirect(route('vaccinator.create'))->withErrors($validator)->withInput();

        }


        $this->vaccinatorRepository->store($request->all());


        return redirect(route('vaccinator.create'))->with([
            'created'=>true,
            'title'  => 'Great!',
            'text'   =>'Vaccinator successfully registered.'
        ]);
    }
}
