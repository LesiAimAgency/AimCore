<?php

use App\Http\Controllers\Api\SyncController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api.token'])->group(function () {
    Route::post('/sync/widgets', [SyncController::class, 'syncWidgets']);
    Route::post('/sync/settings', [SyncController::class, 'syncSettings']);
});

Route::middleware('agency.verify')->group(function () {
    Route::post('/agency/auth', [\App\Http\Controllers\Api\AgencyAuthController::class, 'requestMagicLink']);
});

Route::post('/widgets/sync', [\App\Http\Controllers\Api\WidgetController::class, 'sync']);
Route::get('/widgets/render/{code}', [\App\Http\Controllers\Api\WidgetController::class, 'renderPartial']);
