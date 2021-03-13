<?php namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface PersonRepositoryInterface{

    public function getAllVaccinated():Collection;

}