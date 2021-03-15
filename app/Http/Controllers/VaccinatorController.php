<?php

namespace App\Http\Controllers;

use App\Classes\Facades\Security;
use App\Http\Requests\VaccinatorRequest;
use App\Classes\Facades\User as FacadesUser;
use App\Models\Vaccinator;
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

    public function index()
    {
        Security::checkIfAuthorized(auth()->user(),FacadesUser::ADMIN);

        return view('pages.admin.lists.vaccinators-lists',['vaccinators' => Vaccinator::all()]);
    }

    public function create()
    {
        Security::checkIfAuthorized(auth()->user(),FacadesUser::ADMIN);
        return view('pages.admin.vaccinator-registration', ['user' => 'Admin']);
    }

    private function createVaccinatorValidator($data)
    {
       return Validator::make($data,[
            'firstname'=>'required',
            'lastname'=>'required',
            'position'=>'required',
            'role'=>'required',
            'facility'=>'required',
            'prc'=>'required',
            'municipality_id' => 'required'
        ]);
    }

    public function store(VaccinatorRequest $request)
    {
        Security::checkIfAuthorized(auth()->user(),FacadesUser::ADMIN);
        $validator=$this->createVaccinatorValidator($request->validated());

        if($validator->fails()){
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
