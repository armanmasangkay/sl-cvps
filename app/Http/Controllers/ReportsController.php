<?php

namespace App\Http\Controllers;

use App\Classes\Facades\Security;
use App\Repositories\Contracts\PersonRepositoryInterface;
use App\Classes\Facades\User as FacadesUser;

class ReportsController extends Controller
{

    private $personRepository;

    public function __construct(PersonRepositoryInterface $personRepository)
    {
        $this->personRepository=$personRepository;
    }

    public function index()
    {
        Security::checkIfAuthorized(auth()->user(),FacadesUser::SUPER_ADMIN);
        $vaccinateds=$this->personRepository->getAllVaccinated();

        return view('pages.superadmin.reports',[
            'vaccinateds'=>$vaccinateds,
            'user' => 'Super Admin'
        ]);
    }
}
