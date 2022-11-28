<?php

namespace App\Providers;

use App\City;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
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
        if (app()->isProduction()) {
            URL::forceScheme('https');
        }

        View::composer('backend.*', '\App\Rezervado\ViewComposers\BackendComposer');

        View::composer('layouts.frontend', function ($view) {
            $view->with('cityList', City::orderBy('name', 'ASC')->get());
        });

        View::composer('frontend.*', function ($view) {
            $view->with('placeholder', asset('images/placeholder.jpg'));
        });


        if (App::environment('local')) {
            View::composer('*', function ($view) {
                $view->with('novalidate', 'novalidate');
            });
        } else {
            View::composer('*', function ($view) {
                $view->with('novalidate', null);
            });
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Rezervado\Interfaces\FrontendRepositoryInterface::class, function () {
            return new \App\Rezervado\Repositories\FrontendRepository;
        });


        $this->app->bind(\App\Rezervado\Interfaces\BackendRepositoryInterface::class, function () {
            return new \App\Rezervado\Repositories\BackendRepository;
        });
    }
}
