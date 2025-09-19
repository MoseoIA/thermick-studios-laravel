<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\PortfolioCategoryController;
use App\Http\Controllers\Admin\PortfolioProjectController;
use App\Http\Controllers\Admin\ClientGalleryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('portfolio-categories', PortfolioCategoryController::class);
    Route::resource('portfolio-projects', PortfolioProjectController::class);

    // Rutas para Galerías de Clientes
    Route::post('client-galleries/{clientGallery}/add-photos', [ClientGalleryController::class, 'addPhotos'])->name('client-galleries.addPhotos');
    Route::resource('client-galleries', ClientGalleryController::class)->except(['show']);
});

require __DIR__.'/auth.php';