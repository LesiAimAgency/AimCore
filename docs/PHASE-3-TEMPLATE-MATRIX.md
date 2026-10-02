# MA TRẬN TEMPLATE & LAYOUT – PHASE 3 (TEMPLATE MATRIX)
## BẢN THIẾT KẾ CẤU TRÚC TEMPLATE ĐỘC LẬP TỪ 22 TỆP HTML

> **Mục tiêu cốt lõi:** Tránh sao chép máy móc 22 tệp HTML thành 22 file Blade rời rạc. Tinh gọn hệ thống thành **3 Layouts chuẩn** và **18 Templates linh hoạt**, nâng cao khả năng bảo trì và tái sử dụng tối đa.

---

### 1. PHÂN CẤP LAYOUT CHỦ ĐẠO (LAYOUT HIERARCHY)

```text
resources/views/themes/ehenho/layouts/
│
├── app.blade.php                 (Main Layout: HTML5 Doctype, Head, Meta, CSS, Header, $slot, Footer, JS)
│
├── frontend.blade.php            (Frontend Layout: Kế thừa app.blade.php, Banner/Hero, Full-width content)
│
├── auth.blade.php                (Auth Layout: Kế thừa app.blade.php, Form căn giữa, Tối giản navigation)
│
└── account.blade.php             (Account Layout: Kế thừa app.blade.php, Cấu trúc 2 cột: Sidebar Menu + Nội dung)
```

---

### 2. MA TRẬN QUAN HỆ: TEMPLATE $\leftrightarrow$ TRANG SỬ DỤNG $\leftrightarrow$ LAYOUT

| STT | Mã Template | Các Trang Sử Dụng | Layout Cha | Khối Nội Dung Chính (Sections / Slots) | Blade File Đích |
| :--: | :--- | :--- | :--- | :--- | :--- |
| 1 | `theme-landing` | `index.html` | `layouts.frontend` | `hero-carousel`, `quick-search`, `featured-grid`, `newest-members` | `themes/ehenho/pages/home.blade.php` |
| 2 | `page-content` | `gioi-thieu.html` | `layouts.frontend` | `page-title`, `static-body-content` | `themes/ehenho/pages/about.blade.php` |
| 3 | `search-directory` | `tim-ban-bon-phuong.html`,<br>`tim-ban-bon-phuong-theo-tuoi.html` | `layouts.frontend` | `search-filter-box`, `results-grid`, `pagination-controls` | `themes/ehenho/pages/search/index.blade.php` |
| 4 | `profile-detail` | `profile-detail.html` | `layouts.frontend` | `profile-header`, `profile-avatar`, `profile-details-table`, `action-buttons` | `themes/ehenho/pages/profile/detail.blade.php` |
| 5 | `auth-register` | `signup.html` | `layouts.auth` | `register-wizard-form`, `terms-agreement`, `captcha` | `themes/ehenho/pages/auth/register.blade.php` |
| 6 | `auth-login` | `login.html` | `layouts.auth` | `login-form`, `password-toggle-widget`, `remember-me` | `themes/ehenho/pages/auth/login.blade.php` |
| 7 | `auth-logout` | `logout.html` | `layouts.auth` | `logout-confirmation-box` | `themes/ehenho/pages/auth/logout.blade.php` |
| 8 | `auth-password-reset` | `password-reset.html` | `layouts.auth` | `reset-request-form`, `email-check-hint` | `themes/ehenho/pages/auth/password_reset.blade.php` |
| 9 | `account-password-change`| `password-change.html` | `layouts.account` | `change-password-form`, `password-toggle-widget` | `themes/ehenho/pages/account/password.blade.php` |
| 10 | `profile-my-view` | `my-profile.html` | `layouts.account` | `my-profile-preview`, `profile-completion-bar`, `quick-edit-links` | `themes/ehenho/pages/account/my_profile.blade.php` |
| 11 | `profile-edit` | `profile-edit.html` | `layouts.account` | `comprehensive-edit-form`, `province-district-selector` | `themes/ehenho/pages/account/profile_edit.blade.php` |
| 12 | `account-settings` | `profile-options.html` | `layouts.account` | `notification-preferences`, `privacy-toggles`, `account-deletion` | `themes/ehenho/pages/account/settings.blade.php` |
| 13 | `profile-avatar-upload` | `upload-profile-pic.html` | `layouts.account` | `avatar-upload-dropzone`, `photo-guidelines`, `current-avatar-preview` | `themes/ehenho/pages/account/avatar_upload.blade.php` |
| 14 | `messages-inbox` | `inbox.html` | `layouts.account` | `inbox-tabs`, `message-row-items`, `batch-action-bar` | `themes/ehenho/pages/messages/inbox.blade.php` |
| 15 | `messages-sent` | `sent.html` | `layouts.account` | `sent-tabs`, `message-row-items`, `batch-action-bar` | `themes/ehenho/pages/messages/sent.blade.php` |
| 16 | `messages-thread-view` | `message-view.html` | `layouts.account` | `conversation-history`, `quick-reply-form`, `block-sender-btn` | `themes/ehenho/pages/messages/show.blade.php` |
| 17 | `social-profile-list` | `liked-profiles.html`,<br>`bookmarked-profiles.html`,<br>`blocked-profiles.html`,<br>`contactbook-profiles.html` | `layouts.account` | `social-tab-header`, `profile-card-grid`, `empty-state-notice` | `themes/ehenho/pages/social/index.blade.php` |
| 18 | `account-email-manager` | `email-manager.html` | `layouts.account` | `primary-email-status`, `add-email-form`, `email-verification-list` | `themes/ehenho/pages/account/emails.blade.php` |

---

### 3. THIẾT KẾ CẤU TRÚC BLADE MẪU

#### 3.1. Layout Tổng Thể (`resources/views/themes/ehenho/layouts/app.blade.php`)
```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', config('app.name', 'eHenho.com'))</title>
    <meta name="description" content="@yield('meta_description', 'Trang web hẹn hò online kết bạn')">
    <meta name="keywords" content="@yield('meta_keywords', 'hen ho, tim ban')">
    
    <!-- Theme Isolated Assets -->
    <link rel="icon" href="{{ asset('themes/ehenho/icons/favicon.png') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('themes/ehenho/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ehenho/css/base8.css') }}">
    @stack('styles')
</head>
<body>
    @include('themes.ehenho.components.header')

    <main class="main-content-wrapper">
        @yield('content')
    </main>

    @include('themes.ehenho.components.footer')

    <!-- Theme Isolated Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{ asset('themes/ehenho/js/auth-session.js') }}"></script>
    @stack('scripts')
</body>
</html>
```

#### 3.2. Layout Khu Vực Thành Viên (`resources/views/themes/ehenho/layouts/account.blade.php`)
```blade
@extends('themes.ehenho.layouts.app')

@section('content')
<div class="container account-dashboard-container" style="margin-top: 70px; margin-bottom: 40px;">
    <div class="row">
        <!-- Sidebar Navigation Menu -->
        <aside class="col-md-3 col-sm-4">
            @include('themes.ehenho.components.account-sidebar')
        </aside>

        <!-- Main Account Workspace -->
        <section class="col-md-9 col-sm-8">
            @include('themes.ehenho.components.alerts')
            @yield('account_content')
        </section>
    </div>
</div>
@endsection
```
