<?php

use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Viettinmart\AuthController;
use App\Http\Controllers\Viettinmart\BlogController;
use App\Http\Controllers\Viettinmart\CartController;
use App\Http\Controllers\Viettinmart\CheckoutController;
use App\Http\Controllers\Viettinmart\ContactController;
use App\Http\Controllers\Viettinmart\CustomerActionController;
use App\Http\Controllers\Viettinmart\HomeController;
use App\Http\Controllers\Viettinmart\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sitemap', [SitemapController::class, 'htmlIndex'])->name('sitemap_html');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.index');
Route::get('/cua-hang', [ShopController::class, 'index'])->name('shop.index');
Route::get('/danh-muc/{slug}', [ShopController::class, 'index'])->name('shop.category.danh-muc');
Route::get('/cua-hang/{slug}', [ShopController::class, 'index'])->name('shop.category.cua-hang');
Route::get('/{slug}', [ShopController::class, 'index'])->name('shop.category');
Route::get('/search-suggest', [ShopController::class, 'searchSuggest'])->name('shop.suggest');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/gio-hang', [CartController::class, 'page'])->name('cart.page');
Route::get('/gio-hang/so-luong', [CartController::class, 'count'])->name('cart.count');
Route::get('/gio-hang/dropdown', [CartController::class, 'dropdown'])->name('cart.dropdown');
Route::get('/gio-hang/tong', [CartController::class, 'total'])->name('cart.total');
Route::get('/dat-hang', [CheckoutController::class, 'index'])->name('checkout.index');
Route::get('/dat-hang/thanh-cong/{orderNumber}', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/lien-he', [ContactController::class, 'index'])->name('contact.index');
Route::get('/order-track', [CheckoutController::class, 'trackOrder'])->name('order.track');
Route::post('/order-track', [CheckoutController::class, 'trackOrderPost'])->name('order.track.post');
Route::get('/wishlist', [CustomerActionController::class, 'wishlistIndex'])->name('wishlist');
Route::get('/so-sanh', [CustomerActionController::class, 'compareIndex'])->name('compare.index');
Route::get('/quick-view/{id}', [CustomerActionController::class, 'getQuickView'])->name('product.quickview');

Route::post('/gio-hang/them', [CartController::class, 'add'])->name('cart.add');
Route::post('/gio-hang/xoa', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/gio-hang/cap-nhat', [CartController::class, 'update'])->name('cart.update');
Route::post('/gio-hang/xoa-het', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/gio-hang/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.apply-coupon');
Route::post('/gio-hang/remove-coupon', [CartController::class, 'removeCoupon'])->name('cart.remove-coupon');
Route::post('/dat-hang', [CheckoutController::class, 'store'])->name('checkout.store');
Route::post('/lien-he', [ContactController::class, 'send'])->name('contact.send');
Route::post('/wishlist/add', [CustomerActionController::class, 'addToWishlist'])->name('wishlist.add');
Route::post('/wishlist/remove', [CustomerActionController::class, 'removeFromWishlist'])->name('wishlist.remove');
Route::post('/compare/add', [CustomerActionController::class, 'addToCompare'])->name('compare.add');
Route::post('/compare/remove', [CustomerActionController::class, 'removeFromCompare'])->name('compare.remove');

Route::get('/{slug}', [ShopController::class, 'show'])->name('shop.show');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
Route::post('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/password/reset', function () {
    return 'Reset Password Page';
})->name('password.request');
