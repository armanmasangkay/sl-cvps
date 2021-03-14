<?php namespace App\Repositories\Concretes;

use App\Models\Vaccinator;
use App\Repositories\Contracts\VaccinatorRepositoryInterface;

class VaccinatorRepository implements VaccinatorRepositoryInterface{

    public function store($data)
    {
        Vaccinator::create($data);
    }
}