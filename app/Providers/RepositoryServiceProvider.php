<?php

namespace App\Providers;

use App\Repositories\Concretes\PersonRepository;
use App\Repositories\Concretes\VaccinatorRepository;
use App\Repositories\Contracts\PersonRepositoryInterface;
use App\Repositories\Contracts\VaccinatorRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PersonRepositoryInterface::class,PersonRepository::class);
        $this->app->bind(VaccinatorRepositoryInterface::class,VaccinatorRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
