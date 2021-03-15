<?php

namespace App\Http\Controllers;

use App\Classes\Facades\User;
use App\Repositories\Contracts\PersonRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{

    private $personRepository;

    public function __construct(PersonRepositoryInterface $personRepository)
    {
        $this->personRepository=$personRepository;
    }

    public function index()
    {
        Auth::user()->allowIf(User::SUPER_ADMIN);
        $vaccinateds=$this->personRepository->getAllVaccinated();

        return view('pages.superadmin.reports',[
            'vaccinateds'=>$vaccinateds,
            'user' => 'Super Admin'
        ]);
    }
}
