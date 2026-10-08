<?php

declare(strict_types=1);

use App\Http\Controllers\Themes\Inbetween\InbetweenController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| INBETWEEN Theme & Landing Routes (100% Self-Contained)
|--------------------------------------------------------------------------
*/

Route::get('/', [InbetweenController::class, 'index'])->name('home');
Route::post('/contact', [InbetweenController::class, 'contact'])->name('contact.submit');
Route::post('/form-submit', [InbetweenController::class, 'contact'])->name('form.submit');
Route::get('/trang/{slug}', [InbetweenController::class, 'page'])->name('page.show');
