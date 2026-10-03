<?php

declare(strict_types=1);

use App\Http\Controllers\Themes\Ehenho\AccountController;
use App\Http\Controllers\Themes\Ehenho\AuthController;
use App\Http\Controllers\Themes\Ehenho\ChatAllController;
use App\Http\Controllers\Themes\Ehenho\HomeController;
use App\Http\Controllers\Themes\Ehenho\MessageController;
use App\Http\Controllers\Themes\Ehenho\PageController;
use App\Http\Controllers\Themes\Ehenho\ProfileController;
use App\Http\Controllers\Themes\Ehenho\SearchController;
use App\Http\Controllers\Themes\Ehenho\SocialController;
use Illuminate\Http\Request;
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
Route::get('/tro-giup', [PageController::class, 'help'])->name('help');
Route::get('/dieu-khoan-su-dung', [PageController::class, 'terms'])->name('terms');
Route::get('/chinh-sach-bao-mat', [PageController::class, 'privacy'])->name('privacy');
Route::get('/chinh-sach-rieng-tu', [PageController::class, 'privacy'])->name('privacy_policy');
Route::get('/an-toan-hen-ho', fn () => app(PageController::class)->show('an-toan-hen-ho'))->name('safety');
Route::get('/cau-hoi-thuong-gap', fn () => app(PageController::class)->show('cau-hoi-thuong-gap'))->name('faq');
Route::get('/lien-he', fn () => app(PageController::class)->show('lien-he'))->name('contact');
Route::get('/trang/{slug}', [PageController::class, 'show'])->name('page.show');

// --- 3. Search & Discovery ---
Route::get('/tim-kiem', [SearchController::class, 'index'])->name('search.index');
Route::get('/tim-ban-bon-phuong', [SearchController::class, 'index'])->name('search.bon_phuong');
Route::get('/tim-ban-bon-phuong/{province}', [SearchController::class, 'byLocation'])->name('search.province_direct');
Route::get('/tim-ban-bon-phuong-theo-tuoi/{age?}', [SearchController::class, 'byAge'])->name('search.by_age');
Route::get('/tim-ban-bon-phuong-theo-noi-o/{province?}', [SearchController::class, 'byLocation'])->name('search.by_location');
Route::get('/tim-ban-bon-phuong-theo-chi-tiet', [SearchController::class, 'detailed'])->name('search.detailed');
Route::get('/tim-ban-bon-phuong-tinh-thanh/{province}', [SearchController::class, 'byLocation'])->name('search.province');

// --- 3.1. Footer SEO Category Routes ---
// 1. Photos
Route::get('/tim-ban-bon-phuong-co-hinh', [SearchController::class, 'withPhoto'])->name('search.with_photo');
Route::get('/tim-ban-bon-phuong-co-hinh/nu', fn (Request $r) => app(SearchController::class)->withPhoto($r, 'female'))->name('search.with_photo_female');
Route::get('/tim-ban-bon-phuong-co-hinh/nam', fn (Request $r) => app(SearchController::class)->withPhoto($r, 'male'))->name('search.with_photo_male');

// 2. Regions & Overseas
Route::get('/tim-ban-bon-phuong-viet-nam', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['country' => 'viet-nam'], 'Tìm bạn bốn phương Việt Nam'))->name('search.vietnam');
Route::get('/tim-ban-bon-phuong-nuoc-ngoai', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['country' => 'nuoc-ngoai'], 'Tìm bạn bốn phương nước ngoài'))->name('search.nuoc_ngoai');
Route::get('/tim-ban-bon-phuong-viet-kieu', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['country' => 'viet-kieu'], 'Tìm bạn bốn phương Việt kiều'))->name('search.viet_kieu');
Route::get('/tim-ban-bon-phuong-viet-kieu-my', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['country' => 'viet-kieu-my'], 'Tìm bạn bốn phương Việt kiều Mỹ'))->name('search.viet_kieu_my');
Route::get('/tim-ban-bon-phuong-o-my', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['country' => 'my'], 'Tìm bạn bốn phương ở Mỹ'))->name('search.o_my');
Route::get('/tim-ban-bon-phuong-o-uc', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['country' => 'uc'], 'Tìm bạn bốn phương ở Úc'))->name('search.o_uc');
Route::get('/tim-ban-bon-phuong-o-canada', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['country' => 'canada'], 'Tìm bạn bốn phương ở Canada'))->name('search.o_canada');
Route::get('/tim-ban-bon-phuong-o-duc', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['country' => 'duc'], 'Tìm bạn bốn phương ở Đức'))->name('search.o_duc');

// 3. Marital Status
Route::get('/tim-ban-doc-than', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['marital_status' => 'doc_than'], 'Tìm bạn độc thân'))->name('search.doc_than');
Route::get('/tim-ban-trai-doc-than', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['marital_status' => 'doc_than', 'gender' => 'male'], 'Tìm bạn trai độc thân'))->name('search.trai_doc_than');
Route::get('/tim-ban-gai-doc-than', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['marital_status' => 'doc_than', 'gender' => 'female'], 'Tìm bạn gái độc thân'))->name('search.gai_doc_than');

Route::get('/tim-ban-ly-di', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['marital_status' => 'ly_di'], 'Tìm bạn ly dị'))->name('search.ly_di');
Route::get('/tim-ban-trai-ly-di', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['marital_status' => 'ly_di', 'gender' => 'male'], 'Tìm bạn trai ly dị'))->name('search.trai_ly_di');
Route::get('/tim-ban-gai-ly-di', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['marital_status' => 'ly_di', 'gender' => 'female'], 'Tìm bạn gái ly dị'))->name('search.gai_ly_di');

Route::get('/tim-ban-o-goa', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['marital_status' => 'o_goa'], 'Tìm bạn ở góa'))->name('search.o_goa');
Route::get('/tim-ban-trai-o-goa', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['marital_status' => 'o_goa', 'gender' => 'male'], 'Tìm bạn trai ở góa'))->name('search.trai_o_goa');
Route::get('/tim-ban-gai-o-goa', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['marital_status' => 'o_goa', 'gender' => 'female'], 'Tìm bạn gái ở góa'))->name('search.gai_o_goa');

// 4. Target & Goals
Route::get('/tim-ban-gai-ket-hon', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['looking_for' => 'ket_hon', 'gender' => 'female'], 'Tìm bạn gái kết hôn'))->name('search.gai_ket_hon');
Route::get('/tim-ban-trai-ket-hon', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['looking_for' => 'ket_hon', 'gender' => 'male'], 'Tìm bạn trai kết hôn'))->name('search.trai_ket_hon');
Route::get('/tim-nguoi-yeu-lau-dai', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['looking_for' => 'nguoi_yeu'], 'Tìm người yêu lâu dài'))->name('search.nguoi_yeu_ld');
Route::get('/tim-nguoi-yeu-ngan-han', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['looking_for' => 'ngan_han'], 'Tìm người yêu ngắn hạn'))->name('search.nguoi_yeu_nh');

Route::get('/tim-chong', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['looking_for' => 'chong'], 'Tìm chồng'))->name('search.tim_chong');
Route::get('/tim-vo', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['looking_for' => 'vo'], 'Tìm vợ'))->name('search.tim_vo');
Route::get('/tim-mot-nua', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['looking_for' => 'mot_nua'], 'Tìm một nửa'))->name('search.mot_nua');
Route::get('/tim-ban-tram-nam', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['looking_for' => 'tram_nam'], 'Tìm bạn trăm năm'))->name('search.tram_nam');

Route::get('/tim-ban-gai-tam-su', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['looking_for' => 'tam_su', 'gender' => 'female'], 'Tìm bạn gái tâm sự'))->name('search.gai_tam_su');
Route::get('/tim-ban-trai-tam-su', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['looking_for' => 'tam_su', 'gender' => 'male'], 'Tìm bạn trai tâm sự'))->name('search.trai_tam_su');
Route::get('/tim-ban-gai-lam-quen', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['looking_for' => 'lam_quen', 'gender' => 'female'], 'Tìm bạn gái làm quen'))->name('search.gai_lam_quen');
Route::get('/tim-ban-trai-lam-quen', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['looking_for' => 'lam_quen', 'gender' => 'male'], 'Tìm bạn trai làm quen'))->name('search.trai_lam_quen');
Route::get('/tim-ban-chat', fn (Request $r) => app(SearchController::class)->quickCategory($r, ['looking_for' => 'chat'], 'Tìm bạn chat'))->name('search.ban_chat');

// --- 4. Profile Details ---
Route::get('/ho-so/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/ket-ban/{id}', [ProfileController::class, 'show'])->name('profile.ket_ban');

// --- 5. Authentication ---
Route::get('/dang-nhap', [AuthController::class, 'showLogin'])->name('login');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.en');
Route::post('/login', [AuthController::class, 'login'])->name('login.en.submit');
Route::get('/accounts/login', [AuthController::class, 'showLogin'])->name('login.alias');
Route::post('/dang-nhap', [AuthController::class, 'login'])->name('login.submit');
Route::post('/accounts/login', [AuthController::class, 'login'])->name('login.submit.alias');
Route::get('/dang-ky', [AuthController::class, 'showRegister'])->name('register');
Route::get('/accounts/signup', [AuthController::class, 'showRegister'])->name('signup');
Route::post('/dang-ky', [AuthController::class, 'register'])->name('register.submit');
Route::post('/accounts/signup', [AuthController::class, 'register'])->name('signup.submit');
Route::post('/dang-xuat', [AuthController::class, 'logout'])->name('logout');
Route::get('/quen-mat-khau', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/quen-mat-khau', [AuthController::class, 'sendResetLink'])->name('password.email');

// --- 6. Authenticated User Account Area ---
Route::middleware('auth')->group(function () {
    // Profile Management
    Route::get('/tai-khoan', [ProfileController::class, 'myProfile'])->name('account.my_profile');
    Route::get('/my-profile', [ProfileController::class, 'myProfile'])->name('account.my_profile.alias');
    Route::get('/my-profile.html', [ProfileController::class, 'myProfile'])->name('account.my_profile.html');
    Route::get('/tai-khoan/chinh-sua', [ProfileController::class, 'edit'])->name('account.profile_edit');
    Route::put('/tai-khoan/chinh-sua', [ProfileController::class, 'update'])->name('account.profile_update');
    Route::get('/tai-khoan/anh-dai-dien', [ProfileController::class, 'avatarUpload'])->name('account.avatar_upload');
    Route::post('/tai-khoan/anh-dai-dien', [ProfileController::class, 'saveAvatar'])->name('account.avatar_save');

    // Security & Settings (Bỏ thiết lập tài khoản, redirect về chỉnh sửa hồ sơ)
    Route::get('/tai-khoan/doi-mat-khau', [AccountController::class, 'password'])->name('account.password');
    Route::put('/tai-khoan/doi-mat-khau', [AccountController::class, 'updatePassword'])->name('account.password_update');
    Route::get('/tai-khoan/thiet-lap', fn () => redirect()->route('ehenho.account.profile_edit'))->name('account.settings');
    Route::put('/tai-khoan/thiet-lap', fn () => redirect()->route('ehenho.account.profile_edit'))->name('account.settings_update');
    Route::get('/tai-khoan/email', [AccountController::class, 'emails'])->name('account.emails');
    Route::put('/tai-khoan/email', [AccountController::class, 'updateEmail'])->name('account.email_update');

    // Messaging System (Zalo-like Unified Messenger)
    Route::get('/tin-nhan', [MessageController::class, 'inbox'])->name('messages.inbox');
    Route::get('/tin-nhan/da-gui', fn () => redirect()->route('ehenho.messages.inbox'))->name('messages.sent');
    Route::get('/tin-nhan/hop-thu/{id}', [MessageController::class, 'show'])->name('messages.show');
    Route::get('/tin-nhan/hop-thu/{id}/poll', [MessageController::class, 'poll'])->name('messages.poll');
    Route::get('/tin-nhan/soan-tin', [MessageController::class, 'compose'])->name('messages.compose');
    Route::post('/tin-nhan/gui', [MessageController::class, 'store'])->name('messages.store');
    Route::delete('/tin-nhan/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');

    // Social Connections
    Route::get('/danh-ba', [SocialController::class, 'contacts'])->name('social.contacts');
    Route::get('/da-thich', [SocialController::class, 'likes'])->name('social.likes');
    Route::get('/da-luu', [SocialController::class, 'bookmarks'])->name('social.bookmarks');
    Route::get('/da-chan', [SocialController::class, 'blocked'])->name('social.blocked');
    Route::post('/tuong-tac/toggle', [SocialController::class, 'toggle'])->name('social.toggle');

    // Chat All Community Room (Authenticated Only)
    Route::get('/chat-all/messages', [ChatAllController::class, 'messages'])->name('chat_all.messages');
    Route::post('/chat-all/messages', [ChatAllController::class, 'store'])->name('chat_all.store');
    Route::post('/chat-all/upload', [ChatAllController::class, 'uploadAttachment'])->name('chat_all.upload');
    Route::get('/chat-all/poll', [ChatAllController::class, 'poll'])->name('chat_all.poll');
    Route::post('/chat-all/read', [ChatAllController::class, 'markAsRead'])->name('chat_all.read');
});
