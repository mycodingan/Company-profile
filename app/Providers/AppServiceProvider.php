<?php

namespace App\Providers;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyProfileController;
use App\Models\About;
use App\Models\Testimony; // Import model Testimony
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Company;
use App\Models\Gallery;
use App\Models\Visitor;

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
        View::composer(['company.*', 'about.*', 'gallery.*', 'home', 'product.*','testimony.*','companyprofile.*'], function ($view) {
            $company = Company::findOrFail(1); // Mengambil data company dengan ID 1
            $totalImages = Gallery::count(); // Menghitung total gambar dalam galeri
            $visitorCount = Visitor::count(); // Menghitung total pengunjung
            $testimonies = Testimony::all(); // Mengambil semua testimonies
            $about = About::findOrFail(1); // Mengambil data about dengan ID 1

            // Melewatkan data ke view
            $view->with(compact('company', 'totalImages', 'visitorCount', 'testimonies', 'about'));
        });

        // Memanggil method index dari CompsnyProfileController
        $this->app->make(CompanyProfileController::class)->index();
        $company = Company::findOrFail(1);
        $totalImages = Gallery::count();
        $visitorCount = Visitor::count();
        $testimonies = Testimony::all();
        $about = About::findOrFail(1);
    
        view()->share('company', $company);
        view()->share('totalImages', $totalImages);
        view()->share('visitorCount', $visitorCount);
        view()->share('testimonies', $testimonies);
        view()->share('about', $about);
    }
}
