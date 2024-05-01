<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Password::defaults(function (){
           $theRules =  Password::min(6)->numbers();

               return $this->app->isProduction() ?  $theRules->uncompromised() : $theRules;

        });
        Paginator::useBootstrapFive();
    }
}
