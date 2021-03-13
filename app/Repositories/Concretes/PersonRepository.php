<?php namespace App\Repositories\Concretes;

use App\Models\Person;
use App\Repositories\Contracts\PersonRepositoryInterface;
use Illuminate\Support\Collection;

class PersonRepository implements PersonRepositoryInterface{


    public function getAllVaccinated():Collection
    {
        return Person::has('vaccinations')->get();
    }
}