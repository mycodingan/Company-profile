<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\CompsnyProfileController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestimonyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//halaman utama untuk seluruh tampilan company profile
Route::get('/' , [CompanyProfileController::class, 'index']);

// Route untuk halaman login
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');

// Route untuk halaman register
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register')->middleware('guest');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');

// Grup route yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    // product
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    // company
    Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/company/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::put('/company/update/{id}', [CompanyController::class, 'update'])->name('company.update');
    // galery
    Route::get('gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::post('gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::put('gallery/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
    // tampilan
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/about', [AboutController::class, 'show'])->name('about.show');
    Route::get('/about/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about/update', [AboutController::class, 'update'])->name('about.update');

    //user
    Route::get('/user', [UserController::class, 'index'])->name('users.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/user', [UserController::class, 'store'])->name('users.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('users.update');

    // testimony

    Route::get('/testimony', [TestimonyController::class, 'index'])->name('testimony.index');
    Route::get('/testimony/create', [TestimonyController::class, 'create'])->name('testimony.create');
    Route::post('/testimony', [TestimonyController::class, 'store'])->name('testimony.store');
    Route::get('/testimony/{testimony}/edit', [TestimonyController::class, 'edit'])->name('testimony.edit');
    Route::put('/testimony/{testimony}', [TestimonyController::class, 'update'])->name('testimony.update');
    Route::delete('/testimony/{testimony}', [TestimonyController::class, 'destroy'])->name('testimony.destroy');
});
