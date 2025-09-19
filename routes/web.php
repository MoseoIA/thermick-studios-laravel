<?php

use App\Http\Controllers\Admin\PortfolioCategoryController;
use App\Http\Controllers\Admin\PortfolioProjectController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('portfolio-categories', PortfolioCategoryController::class);
    Route::resource('portfolio-projects', PortfolioProjectController::class);
});
