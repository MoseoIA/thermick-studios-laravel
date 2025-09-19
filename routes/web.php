<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\PortfolioCategoryController;
use App\Http\Controllers\Admin\PortfolioProjectController;
use App\Http\Controllers\Admin\ClientGalleryController; // Línea que faltaba

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
    Route::resource('client-galleries', ClientGalleryController::class); // Línea duplicada eliminada
});

require __DIR__.'/auth.php';