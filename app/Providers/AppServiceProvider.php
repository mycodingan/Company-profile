<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Company;
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
        View::composer(['company.*', 'about.*', 'gallery.*', 'home'], function ($view) {
            $company = Company::findOrFail(1); // Mengambil data company dengan ID 1
            $view->with('company', $company);
        });
    }
}
