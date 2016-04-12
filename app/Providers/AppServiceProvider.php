<?php

namespace Republicas\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('App\Repositories\RepublicaRepository',
            'App\Repositories\RepublicaRepositoryEloquent');

        App::bind('App\Repositories\RepublicaAccountRepository',
            'App\Repositories\RepublicaAccountRepositoryEloquent');

        App::bind('App\Repositories\PersonalAccountRepository',
            'App\Repositories\PersonalAccountRepositoryEloquent');
    }
}
