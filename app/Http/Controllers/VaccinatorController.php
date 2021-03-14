<?php

namespace App\Http\Controllers;

use App\Models\Vaccinator;
use App\Repositories\Contracts\VaccinatorRepositoryInterface;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $this->vaccinatorRepository->store($request->all());
        return redirect(route('vaccinator.create'))->with([
            'created'=>true,
            'message'=>'Vaccinator successfully registered.'
        ]);
    }
}
