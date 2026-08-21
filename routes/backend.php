<?php

// MODIFIED: 2025-12-18 - Converted to Multi-Site Architecture
// All CMS functionality moved to project-specific routes: /{projectCode}/admin/*

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ShippingEngineController;
use App\Http\Controllers\SuperAdmin\ProjectController;
use Illuminate\Support\Facades\Route;

// Super Admin Routes - Global system management only
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    // Super Admin Dashboard - for managing multiple projects
    Route::get('/', [DashboardController::class, 'superAdminDashboard'])->name('dashboard');

    // Project Management (Super Admin only)
    Route::resource('projects', ProjectController::class);

    // Global System Settings
    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingsController::class, 'save'])->name('settings.save');

    Route::prefix('settings')->name('settings.')->group(function () {
        Route::post('scan-translations', [SettingsController::class, 'scanTranslations'])->name('scan-translations');
        Route::get('contact', fn () => view('cms.settings.contact'))->name('contact');
        Route::get('notifications', fn () => view('cms.settings.notifications'))->name('notifications');
        Route::get('fonts', fn () => view('cms.settings.fonts'))->name('fonts');
        Route::get('logs', fn () => view('cms.settings.logs'))->name('logs');
        Route::get('analytics', fn () => view('cms.settings.analytics'))->name('analytics');
        Route::get('watermark', fn () => view('cms.settings.watermark'))->name('watermark');
        Route::get('toc', fn () => view('cms.settings.toc'))->name('toc');
        Route::get('social', fn () => view('cms.settings.social'))->name('social');
        Route::get('payment', fn () => view('cms.settings.payment'))->name('payment');
        Route::get('shipping', [ShippingEngineController::class, 'index'])->name('shipping');
        Route::post('shipping/calculate', [ShippingEngineController::class, 'calculate'])->name('shipping.calculate');
        Route::get('ai', fn () => view('cms.settings.ai'))->name('ai');
        Route::get('reviews', fn () => view('cms.settings.reviews'))->name('reviews');
        Route::get('languages', fn () => view('cms.settings.languages'))->name('languages');
        Route::get('forms', fn () => view('cms.settings.forms'))->name('forms');
        Route::get('contact-buttons', fn () => view('cms.settings.contact-buttons'))->name('contact-buttons');
        Route::get('redirects', fn () => view('cms.settings.redirects'))->name('redirects');
        Route::get('seo', fn () => view('cms.settings.seo'))->name('seo');
        Route::get('popups', fn () => view('cms.settings.popups'))->name('popups');
        Route::get('permissions', fn () => view('cms.settings.permissions'))->name('permissions');
        Route::get('fake-notifications', fn () => view('cms.settings.fake-notifications'))->name('fake-notifications');
    });

    // Global Media Management (if needed) - TODO: Check if MediaController exists
    // Route::get('media/list', [\App\Http\Controllers\Admin\MediaController::class, 'list'])->name('media.list');
    // Route::post('media/upload', [\App\Http\Controllers\Admin\MediaController::class, 'upload'])->name('media.upload');
    // Route::post('media/folder', [\App\Http\Controllers\Admin\MediaController::class, 'createFolder'])->name('media.folder.create');
    // Route::delete('media/folder', [\App\Http\Controllers\Admin\MediaController::class, 'deleteFolder'])->name('media.folder.delete');
    // Route::post('media/move', [\App\Http\Controllers\Admin\MediaController::class, 'move'])->name('media.move');
    // Route::delete('media/{id}', [\App\Http\Controllers\Admin\MediaController::class, 'destroy'])->name('media.destroy');

    // System Logs & Backups (Super Admin only) - TODO: Create SystemController
    // Route::get('logs', [\App\Http\Controllers\Admin\SystemController::class, 'logs'])->name('logs.index');
    // Route::get('backups', [\App\Http\Controllers\Admin\SystemController::class, 'backups'])->name('backups.index');
    // Route::post('backups/create', [\App\Http\Controllers\Admin\SystemController::class, 'createBackup'])->name('backups.create');
});

// NOTE: All content management (products, categories, orders, etc.)
// is now handled through project-specific routes in routes/project.php
// Format: /{projectCode}/admin/{resource}
