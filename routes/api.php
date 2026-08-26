<?php

use App\Http\Controllers\Api\AgencyAuthController;
use App\Http\Controllers\Api\SyncController;
use App\Http\Controllers\Api\WidgetController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api.token'])->group(function () {
    Route::post('/sync/widgets', [SyncController::class, 'syncWidgets']);
    Route::post('/sync/settings', [SyncController::class, 'syncSettings']);
});

Route::middleware('agency.verify')->group(function () {
    Route::post('/agency/auth', [AgencyAuthController::class, 'requestMagicLink']);
});

Route::post('/widgets/sync', [WidgetController::class, 'sync']);
Route::get('/widgets/render/{code}', [WidgetController::class, 'renderPartial']);
