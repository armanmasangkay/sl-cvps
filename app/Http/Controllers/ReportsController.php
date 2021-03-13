<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\PersonRepositoryInterface;

class ReportsController extends Controller
{

    private $personRepository;

    public function __construct(PersonRepositoryInterface $personRepository)
    {
        $this->personRepository=$personRepository;
    }

    public function index()
    {
        $vaccinateds=$this->personRepository->getAllVaccinated();

        return view('pages.superadmin.reports',[
            'vaccinateds'=>$vaccinateds
        ]);
    }
}
