<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route untuk halaman login
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');

// Route untuk halaman register
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register')->middleware('guest');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');

// Grup route yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::post('gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::put('gallery/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('gallery/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/about', [AboutController::class, 'show'])->name('about.show');
    Route::get('/about/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about/update', [AboutController::class, 'update'])->name('about.update');
});
