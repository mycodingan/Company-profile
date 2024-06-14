<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Company;
use App\Models\Gallery;

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
        View::composer(['company.*', 'about.*', 'gallery.*', 'home','product.*'], function ($view) {
            $company = Company::findOrFail(1); // Mengambil data company dengan ID 1
            $view->with('company', $company);
        });

        View::composer(['company.*', 'about.*', 'gallery.*', 'home','product.*'], function ($view) {
            $totalImages = Gallery::count(); // Menghitung total gambar dalam galeri
            $view->with('totalImages', $totalImages); // Melewatkan totalImages ke view
        });
    }
}
