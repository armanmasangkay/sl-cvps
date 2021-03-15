<?php

namespace App\Http\Controllers;

use App\Classes\Facades\User;
use App\Http\Requests\VaccinatorRequest;
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
        return view('pages.admin.lists.vaccinators-lists');
    }

    public function create()
    {
        Auth::user()->allowIf(User::ADMIN);
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
            'prc'=>'required'
        ]);
    }

    public function store(VaccinatorRequest $request)
    {
        Auth::user()->allowIf(User::ADMIN);
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
