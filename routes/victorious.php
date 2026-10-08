<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'project.context'])->group(function () {
    Route::get('/', function () {
        return view('frontend.themes.victorious.home');
    })->name('home');
});
