<?php

declare(strict_types=1);

use App\Http\Controllers\Themes\Ehenho\AccountController;
use App\Http\Controllers\Themes\Ehenho\AuthController;
use App\Http\Controllers\Themes\Ehenho\HomeController;
use App\Http\Controllers\Themes\Ehenho\MessageController;
use App\Http\Controllers\Themes\Ehenho\PageController;
use App\Http\Controllers\Themes\Ehenho\ProfileController;
use App\Http\Controllers\Themes\Ehenho\SearchController;
use App\Http\Controllers\Themes\Ehenho\SocialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| eHenho Theme Routes (100% Isolated Multi-Database & Multi-Tenant)
|--------------------------------------------------------------------------
*/

// --- 1. Homepage ---
Route::get('/', [HomeController::class, 'index'])->name('home');

// --- 2. Static Informational Pages ---
Route::get('/gioi-thieu', [PageController::class, 'about'])->name('about');
Route::get('/dieu-khoan-su-dung', [PageController::class, 'terms'])->name('terms');
Route::get('/chinh-sach-bao-mat', [PageController::class, 'privacy'])->name('privacy');

// --- 3. Search & Discovery ---
Route::get('/tim-kiem', [SearchController::class, 'index'])->name('search.index');
Route::get('/tim-ban-bon-phuong', [SearchController::class, 'index'])->name('search.bon_phuong');
Route::get('/tim-ban-bon-phuong-theo-tuoi/{age?}', [SearchController::class, 'byAge'])->name('search.by_age');

// --- 4. Profile Details ---
Route::get('/ho-so/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/ket-ban/{id}', [ProfileController::class, 'show'])->name('profile.ket_ban');

// --- 5. Authentication ---
Route::get('/dang-nhap', [AuthController::class, 'showLogin'])->name('login');
Route::post('/dang-nhap', [AuthController::class, 'login'])->name('login.submit');
Route::get('/dang-ky', [AuthController::class, 'showRegister'])->name('register');
Route::post('/dang-ky', [AuthController::class, 'register'])->name('register.submit');
Route::post('/dang-xuat', [AuthController::class, 'logout'])->name('logout');
Route::get('/quen-mat-khau', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/quen-mat-khau', [AuthController::class, 'sendResetLink'])->name('password.email');

// --- 6. Authenticated User Account Area ---
Route::middleware('auth')->group(function () {
    // Profile Management
    Route::get('/tai-khoan', [ProfileController::class, 'myProfile'])->name('account.my_profile');
    Route::get('/tai-khoan/chinh-sua', [ProfileController::class, 'edit'])->name('account.profile_edit');
    Route::put('/tai-khoan/chinh-sua', [ProfileController::class, 'update'])->name('account.profile_update');
    Route::get('/tai-khoan/anh-dai-dien', [ProfileController::class, 'avatarUpload'])->name('account.avatar_upload');
    Route::post('/tai-khoan/anh-dai-dien', [ProfileController::class, 'saveAvatar'])->name('account.avatar_save');

    // Security & Settings
    Route::get('/tai-khoan/doi-mat-khau', [AccountController::class, 'password'])->name('account.password');
    Route::put('/tai-khoan/doi-mat-khau', [AccountController::class, 'updatePassword'])->name('account.password_update');
    Route::get('/tai-khoan/thiet-lap', [AccountController::class, 'settings'])->name('account.settings');
    Route::put('/tai-khoan/thiet-lap', [AccountController::class, 'updateSettings'])->name('account.settings_update');
    Route::get('/tai-khoan/email', [AccountController::class, 'emails'])->name('account.emails');

    // Messaging System
    Route::get('/tin-nhan', [MessageController::class, 'inbox'])->name('messages.inbox');
    Route::get('/tin-nhan/da-gui', [MessageController::class, 'sent'])->name('messages.sent');
    Route::get('/tin-nhan/hop-thu/{id}', [MessageController::class, 'show'])->name('messages.show');
    Route::get('/tin-nhan/soan-tin', [MessageController::class, 'compose'])->name('messages.compose');
    Route::post('/tin-nhan/gui', [MessageController::class, 'store'])->name('messages.store');
    Route::delete('/tin-nhan/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');

    // Social Connections
    Route::get('/danh-ba', [SocialController::class, 'contacts'])->name('social.contacts');
    Route::get('/da-thich', [SocialController::class, 'likes'])->name('social.likes');
    Route::get('/da-luu', [SocialController::class, 'bookmarks'])->name('social.bookmarks');
    Route::get('/da-chan', [SocialController::class, 'blocked'])->name('social.blocked');
    Route::post('/tuong-tac/toggle', [SocialController::class, 'toggle'])->name('social.toggle');
});
