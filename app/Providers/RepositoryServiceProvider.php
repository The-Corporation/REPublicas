<?php

namespace Republicas\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('Republicas\Repositories\RepublicaRepository',
            'Republicas\Repositories\RepublicaRepositoryEloquent');

        App::bind('Republicas\Repositories\RepublicaAccountRepository',
            'Republicas\Repositories\RepublicaAccountRepositoryEloquent');

        App::bind('Republicas\Repositories\PersonalAccountRepository',
            'Republicas\Repositories\PersonalAccountRepositoryEloquent');
    }
}
