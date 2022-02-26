<?php

namespace App\Providers;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Inertia::share(
            'errors', function () {
            if (Session::get('errors')) {
                $bags = [];
                foreach (Session::get('errors')->getBags() as $bag => $error) {
                    $bags[$bag] = $error->getMessages();
                }
                return $bags;
            }
            return (object)[];
        });

        Inertia::share('flash', function () { 
            return [
                'success' => Session::get('success'),
                'error' => Session::get('error'),
            ];
        });
    }
}
