<?php

use App\Http\Controllers\Wkcomputer\AuthController;
use App\Http\Controllers\Wkcomputer\BlogController;
use App\Http\Controllers\Wkcomputer\BuildPcController;
use App\Http\Controllers\Wkcomputer\CartController;
use App\Http\Controllers\Wkcomputer\CheckoutController;
use App\Http\Controllers\Wkcomputer\ContactController;
use App\Http\Controllers\Wkcomputer\CustomerActionController;
use App\Http\Controllers\Wkcomputer\HomeController;
use App\Http\Controllers\Wkcomputer\RouteController;
use App\Http\Controllers\Wkcomputer\ShopController;
use Illuminate\Support\Facades\Route;

// ─── HOME ───────────────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');

// ─── SHOP ───────────────────────────────────────────────────
Route::get('/cua-hang', [ShopController::class, 'index'])->name('shop.index');
Route::get('/search-suggest', [ShopController::class, 'searchSuggest'])->name('shop.suggest');
Route::get('/api/search/suggestions', [ShopController::class, 'searchSuggestions'])->name('api.search.suggestions');

// ─── BUILD PC ───────────────────────────────────────────────
Route::get('/xay-dung-cau-hinh', [BuildPcController::class, 'index'])->name('build_pc.index');
Route::get('/xay-dung-cau-hinh/api-products', [BuildPcController::class, 'getProducts'])->name('build_pc.api_products');

// ─── BLOG ───────────────────────────────────────────────────
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/tin-tuc', [BlogController::class, 'index'])->name('blog.index.alias');

// ─── CART ───────────────────────────────────────────────────
Route::get('/gio-hang', [CartController::class, 'page'])->name('cart.page');
Route::get('/gio-hang/so-luong', [CartController::class, 'count'])->name('cart.count');
Route::get('/gio-hang/dropdown', [CartController::class, 'dropdown'])->name('cart.dropdown');
Route::get('/gio-hang/tong', [CartController::class, 'total'])->name('cart.total');
Route::post('/gio-hang/them', [CartController::class, 'add'])->name('cart.add');
Route::post('/gio-hang/them-nhieu', [CartController::class, 'addMultiple'])->name('cart.addMultiple');
Route::post('/gio-hang/them-combo', [CartController::class, 'addCombo'])->name('cart.addCombo');
Route::post('/gio-hang/xoa', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/gio-hang/cap-nhat', [CartController::class, 'update'])->name('cart.update');
Route::post('/gio-hang/xoa-het', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/gio-hang/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.apply-coupon');
Route::post('/gio-hang/remove-coupon', [CartController::class, 'removeCoupon'])->name('cart.remove-coupon');

// ─── CHECKOUT ───────────────────────────────────────────────
Route::get('/dat-hang', [CheckoutController::class, 'index'])->name('checkout.index');
Route::get('/thanh-toan', [CheckoutController::class, 'index'])->name('checkout.index.alias');
Route::post('/dat-hang', [CheckoutController::class, 'store'])->name('checkout.store');
Route::post('/thanh-toan', [CheckoutController::class, 'store'])->name('checkout.store.alias');
Route::get('/dat-hang/thanh-cong/{orderNumber}', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/order-track', [CheckoutController::class, 'trackOrder'])->name('order.track');
Route::post('/order-track', [CheckoutController::class, 'trackOrderPost'])->name('order.track.post');
Route::post('/payment/kredivo/calculate', [CheckoutController::class, 'kredivoCalculate'])->name('kredivo.calculate');

// ─── CONTACT ────────────────────────────────────────────────
Route::get('/lien-he', [ContactController::class, 'index'])->name('contact.index');
Route::post('/lien-he', [ContactController::class, 'send'])->name('contact.send');

// ─── WISHLIST & COMPARE & QUICKVIEW ──────────────────────────
Route::get('/wishlist', [CustomerActionController::class, 'wishlistIndex'])->name('wishlist');
Route::post('/wishlist/add', [CustomerActionController::class, 'addToWishlist'])->name('wishlist.add');
Route::post('/wishlist/remove', [CustomerActionController::class, 'removeFromWishlist'])->name('wishlist.remove');
Route::get('/wishlist/ids', [CustomerActionController::class, 'getWishlistIds'])->name('wishlist.ids');
Route::get('/so-sanh', [CustomerActionController::class, 'compareIndex'])->name('compare.index');
Route::get('/so-sanh-sp', [CustomerActionController::class, 'compareIndex'])->name('compare');
Route::post('/compare/add', [CustomerActionController::class, 'addToCompare'])->name('compare.add');
Route::post('/compare/remove', [CustomerActionController::class, 'removeFromCompare'])->name('compare.remove');
Route::get('/compare/data', [CustomerActionController::class, 'getCompareData'])->name('compare.data');
Route::get('/quick-view/{id}', [CustomerActionController::class, 'getQuickView'])->name('product.quickview');

Route::post('/newsletter/subscribe', fn () => response()->json(['success' => true, 'message' => 'Đăng ký nhận tin thành công!']))->name('newsletter.subscribe');
Route::post('/review/submit', fn () => response()->json(['success' => true, 'message' => 'Cảm ơn bạn đã gửi đánh giá!']))->name('review.submit');

// ─── CUSTOMER AUTH & ACCOUNT ──────────────────────────────────────────
Route::get('/khach-hang/dang-nhap', [AuthController::class, 'showLogin'])->name('customer.login');
Route::post('/khach-hang/dang-nhap', [AuthController::class, 'login']);
Route::get('/khach-hang/dang-ky', [AuthController::class, 'showRegister'])->name('customer.register');
Route::post('/khach-hang/dang-ky', [AuthController::class, 'register']);
Route::post('/khach-hang/dang-xuat', [AuthController::class, 'logout'])->name('customer.logout');

Route::prefix('tai-khoan')->middleware('auth')->group(function () {
    Route::get('/thong-tin', [AuthController::class, 'profile'])->name('profile');
    Route::put('/thong-tin', [AuthController::class, 'updateProfile'])->name('account.profile.update');
    Route::get('/don-hang', [AuthController::class, 'orders'])->name('account.orders');
    Route::get('/don-hang/{order}', [AuthController::class, 'orderDetail'])->name('order.detail');
    Route::get('/don-hang/{order}/ajax', [AuthController::class, 'orderDetailAjax'])->name('order.detail.ajax');
});

// ─── ALIASES ─────────────────────────────────────────────────
Route::get('/san-pham/{slug}', fn (string $slug) => redirect("wkcomputer/$slug", 301))->name('product.show');
Route::get('/bai-viet/{slug}', fn (string $slug) => redirect("wkcomputer/$slug", 301))->name('blog.show');

// ─── DYNAMIC SLUG (LAST) ─────────────────────────────────────
$slugBlacklist = 'admin|cua-hang|blog|gio-hang|dat-hang|lien-he|login|register|logout|tai-khoan|wishlist|so-sanh|quick-view|san-pham|bai-viet|order-track|xay-dung-cau-hinh';
Route::get('{slug}', [RouteController::class, 'index'])
    ->where('slug', '^(?!(?:'.$slugBlacklist.')$)[^/]+$')
    ->name('shop.show');
