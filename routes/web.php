<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientGalleryViewController; // <- Asegúrate que esta línea esté
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

// --- RUTAS PÚBLICAS DEL ÁREA DE CLIENTES --- // (ESTE ES EL BLOQUE QUE FALTA)
Route::get('/area-de-clientes', [ClientGalleryViewController::class, 'portal'])->name('client.portal');
Route::get('/galeria/{slug}', [ClientGalleryViewController::class, 'showPasswordForm'])->name('client.gallery.password');
Route::post('/galeria/{slug}/password', [ClientGalleryViewController::class, 'checkPassword'])->name('client.gallery.checkPassword');


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('portfolio-categories', PortfolioCategoryController::class);
    Route::resource('portfolio-projects', PortfolioProjectController::class);

    // Rutas para Galerías de Clientes en el Admin
    Route::post('client-galleries/{clientGallery}/add-photos', [ClientGalleryController::class, 'addPhotos'])->name('client-galleries.addPhotos');
    Route::resource('client-galleries', ClientGalleryController::class)->except(['show']);
});

require __DIR__.'/auth.php';