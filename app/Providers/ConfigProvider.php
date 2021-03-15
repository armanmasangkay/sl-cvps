<?php

namespace App\Providers;

use App\Configs\Contracts\PersonRegistrationInterface;
use App\Configs\PersonRegistration;
use Illuminate\Support\ServiceProvider;

class ConfigProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PersonRegistrationInterface::class,PersonRegistration::class);
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
