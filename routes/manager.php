<?php

use App\Http\Controllers\Manager\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::prefix('manager')->name('manager.')->middleware(['auth'])->group(function () {
    // Redirect /manager to employees list for now
    Route::get('/', function () {
        return redirect()->route('manager.employees.index');
    })->name('dashboard');

    Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');
});
