# BÁO CÁO SCAN & KIỂM ĐỊNH TOÀN DIỆN – PHASE 3
## TÍCH HỢP 22 STATIC HTML → THEME SYSTEM → MULTI-PROJECT → MULTI-DATABASE

> **Thời điểm kiểm định:** Tháng 10/2026  
> **Kiến trúc nền tảng:** Laravel Framework 12.0.x / PHP 8.2.14 / MySQL 8.x (MAMP)  
> **Phạm vi kiểm định:** 
> 1. Source tĩnh: `@public/e-henho` (22 HTML + 514 assets)  
> 2. Source Laravel hiện hữu: `c:\MAMP\htdocs\core\VGTDemo` (118 Controllers, 79 Models, 102 Migrations, 78 Live Database Tables)  
> **Trạng thái thực thi:** TUÂN THỦ NGUYÊN TẮC ZERO-CODE TRƯỚC KHI DUYỆT BẢN THIẾT KẾ KIẾN TRÚC.

---

## 1. TỔNG QUAN PHẦN CỨNG & MÔI TRƯỜNG THỰC THI (ENVIRONMENT)

* **PHP Version:** `8.2.14` (ZTS Visual C++ 2019 x64, CLI / Apache MAMP). Ràng buộc `composer.json`: `^8.2`.
* **Laravel Framework Version:** `12.0.x` (cài đặt thực tế qua `composer.lock`: `12.64.0`).
* **Node.js & NPM:** Node.js `v24.16.0`, NPM `11.13.0`.
* **Frontend Build Pipeline:**
  * Vite: `^7.0.4`
  * Tailwind CSS: `^4.0.7` (`@tailwindcss/vite: ^4.1.11`)
  * Livewire: `v4` (Starter kit, `livewire/volt: ^1.7.0`, `livewire/flux: ^2.6`)
  * Lưu ý theo quy chuẩn cập nhật [sdlc_rules.md](file:///c:/MAMP/htdocs/core/VGTDemo/.antigravity/rules/sdlc_rules.md): Core và SuperAdmin sử dụng chuẩn Tailwind v4 + Flux UI; các theme dự án chuyên biệt (như `ehenho`) được phép duy trì hệ stylesheet nguyên bản (Bootstrap 3.3.6 isolated + Base8 CSS) để bảo toàn tuyệt đối 100% độ trung thực giao diện (Visual Fidelity).
* **Cơ sở dữ liệu mặc định:** MySQL `127.0.0.1:3306`, Database: `core`, User: `root`.

---

## 2. AUDIT NGUỒN STATIC HTML (`public/e-henho`)

### 2.1. Kiểm kê Định lượng (Quantitative Audit)
* **Tổng số trang HTML:** 22 file HTML độc lập.
* **Tổng số Template độc lập phát hiện:** 18 Templates.
* **Tổng số Layout kiến trúc:** 3 Layouts chính:
  1. `layouts.frontend`: Trang chủ, xem chi tiết hồ sơ, tìm kiếm, giới thiệu.
  2. `layouts.auth`: Đăng ký, đăng nhập, quên mật khẩu, kích hoạt.
  3. `layouts.account`: Hồ sơ của tôi, sửa hồ sơ, danh sách bạn bè, hộp thư, gửi tin nhắn, cài đặt email, đổi mật khẩu.
* **Tổng số Assets:** 514 files (~6.7 MB) bao gồm:
  * Images: 469 files (~6.4 MB)
  * CSS: 3 files (`base8.css`, `carousel.css`, `normalize.css`)
  * JS: 13 files (12 scripts logic + 1 file dữ liệu hành chính `vietnam_provinces.json`)
  * Icons: 1 file `favicon.png`
  * Vendor / Fonts: Thư mục rỗng (các font và thư viện vendor chính được tải qua CDN hoặc mã hóa trong CSS).

### 2.2. Kết quả Deduplication & Kiểm tra Tính toàn vẹn Asset
* **Phân tích Hash MD5 hình ảnh:**
  * Có **1 cặp hình ảnh trùng lặp nhị phân 100%** (khác tên file nhưng trùng MD5 hash).
  * **95 hình ảnh** được tham chiếu trực tiếp trong 22 trang HTML (logo, placeholder, icons giao diện, avatar mẫu demo).
  * **374 hình ảnh** là avatar dự phòng / dữ liệu crawl dư thừa (sẽ đưa vào thư mục demo media dự án, không nạp vào build bundle để tránh phình dung lượng).
* **Phân tích Script phụ thuộc:**
  * Thư viện `django.csrf.js`: Phát hiện là tệp trích xuất cookie CSRF từ framework gốc của website cũ (Django). Trong Laravel Blade sẽ được thay thế hoàn toàn bằng directive chuẩn `@csrf` hoặc meta `csrf-token` và Axios interceptor.
  * Thư viện `auth-session.js`: Script quản lý trạng thái hiển thị đăng nhập/đăng xuất ở client-side; sẽ được chuẩn hóa đồng bộ với Laravel Auth Session (`auth()->check()`).
  * File `vietnam_provinces.json` (105 KB): Dataset 63 tỉnh thành & quận huyện chuẩn Việt Nam; sẽ được đưa vào làm cơ sở seeder cho bảng `provinces` & `districts` hoặc asset động cho bộ lọc tìm kiếm.

---

## 3. AUDIT NGUỒN LARAVEL CORE HIỆN HỮU

### 3.1. Route System
Hệ thống route của Laravel core hiện tại phân tách thành các module rõ ràng:
1. `routes/web.php`: Root endpoints, redirect handlers, media watermarking, sitemaps.
2. `routes/project.php`: Central multisite routing hub định tuyến qua tiền tố `{projectCode}` và `{projectCode}/admin/*`.
3. `routes/wkcomputer.php`: Storefront và Customer account chuyên biệt cho tenant `wkcomputer`.
4. `routes/viettinmart.php`: Storefront cho tenant `viettinmart-eco`.
5. `routes/backend.php`: Legacy CMS backoffice routes.
6. `routes/api.php` & `routes/console.php`: API endpoints và lệnh console.

### 3.2. Controller Architecture (118 Controllers)
* **SuperAdmin Hub (24 controllers):** Quản lý toàn bộ vòng đời Project (`ProjectController`, `ProjectCodeController`), kết nối cPanel & Deployment (`CpanelController`, `DeploymentController`, `TechnicianDeploymentController`), quản lý Users, Roles, Tickets, Briefs.
* **Admin CMS (35 controllers):** Bộ CMS hoàn chỉnh gồm Products, Categories, Brands, Attributes, Orders, FormSubmissions, Reviews, Menus, Media, Widgets, và 21 module Settings.
* **Frontend Storefronts:**
  * `Viettinmart/` (17 controllers): Xử lý shop, cart, checkout, category cho tenant Viettinmart.
  * `Wkcomputer/` (10 controllers): Xử lý PC builder, hardware catalog, gaming rigs cho tenant WKComputer.
* **Auth & Base:** 4 Auth controllers (`LoginController`, `RegisterController`, `ProjectLoginController`, `AuthenticatedSessionController`) và base `Controller`.

### 3.3. Model Architecture (79 Models)
* Các model cốt lõi của SuperAdmin: `Project`, `Tenant`, `ProjectUser`, `ProjectSetting`, `Department`, `ServiceContract`, `DeploymentProfile`.
* Các model nội dung thương mại & CMS: `Product`, `WkProduct`, `Category`, `Post`, `Order`, `Widget`, `Menu`, `FormSubmission`, `Review`, `MediaFolder`.
* Phạm vi Scoping: Hầu hết các model nội dung đều cài đặt trait `BelongsToTenant` hoặc sử dụng trường `project_id` / `tenant_id` để lọc dữ liệu ở mức query scope.

### 3.4. Database Architecture Hiện Hữu (78 Bảng Thực Tế)
Qua lệnh inspect trực tiếp trên MySQL `core`:
* **Bảng Central System:** `projects`, `tenants`, `users`, `roles`, `permissions`, `project_members`, `cpanel_profiles`, `deployment_logs`.
* **Bảng Scoped Content:** `posts`, `products_enhanced`, `taxonomies`, `orders`, `widgets`, `project_settings`, `menus`, `form_submissions`, `reviews`, `media_files`.
* **Đặc tính bảng `projects` hiện tại:**
  * Trường `code` (ví dụ: `viettinmart-eco`, `wkcomputer`, `HD005`).
  * Trường `subdomain` / `external_domain`.
  * Trường `tenant_id` liên kết với bảng `tenants`.
  * Cấu hình triển khai cPanel lưu tại cột JSON `deployment_config`.
* **Đặc tính bảng `tenants` hiện tại:**
  * Trường `code`, `domain`, `database_name` (chứa tên DB riêng như `core`, `agency_cms`, `aim_agency`, `fukkatsu_wkcomputer`).
  * Trường `settings` (lưu JSON theme, ví dụ: `{"theme": "wkcomputerdemo"}`).

---

## 4. ĐÁNH GIÁ CƠ CHẾ TENANCY & THEME HIỆN TẠI

| Cơ chế | Hiện trạng trong Code | Nhược điểm / Rủi ro phát hiện | Giải pháp chuẩn hóa Phase 3 |
| :--- | :--- | :--- | :--- |
| **Project Resolver** | `ProjectSubdomainMiddleware` giải quyết qua route param `{projectCode}` hoặc host | Chưa hỗ trợ linh hoạt domain riêng/custom domain độc lập cho từng website mà không cần tiền tố path | Mở rộng Resolver: Ưu tiên Domain matching $\rightarrow$ Subdomain $\rightarrow$ Path Prefix |
| **Theme Resolver** | `view()->getFinder()->prependLocation(...)` trong middleware | Prepend động trên finder có thể rò rỉ đường dẫn view giữa các request trên cùng process worker nếu không cô lập | Đóng gói vào `ThemeResolver` service riêng; resolve view namespace `themes::{theme_name}::...` |
| **Database Resolver** | `SetProjectDatabase`: gán config vào `database.connections.project` và gọi `DB::setDefaultConnection('project')` | Chế độ tách DB (`setupMultisiteDatabase`) trước đây bị comment lại vì shared hosting; `DB::setDefaultConnection` toàn cục có nguy cơ leak state | Xây dựng dynamic DB connection theo mô hình Central DB + Project DB; trả về connection an toàn qua Model connection resolver |

---

## 5. MA TRẬN 22 TRANG HTML $\rightarrow$ LARAVEL ROUTE $\rightarrow$ THEME E-HENHO

| STT | File HTML Gốc | Loại Trang | Template | Blade View Mục Tiêu | Route Đề Xuất | Controller / Action |
| :--: | :--- | :--- | :--- | :--- | :--- | :--- |
| 1 | `index.html` | Homepage | `theme-landing` | `themes.ehenho.pages.home` | `GET /` | `HomeController@index` |
| 2 | `gioi-thieu.html` | Content | `page-content` | `themes.ehenho.pages.about` | `GET /gioi-thieu` | `PageController@show` |
| 3 | `tim-ban-bon-phuong.html` | Search | `search-directory` | `themes.ehenho.pages.search.index` | `GET /tim-ban-bon-phuong` | `SearchController@index` |
| 4 | `tim-ban-bon-phuong-theo-tuoi.html` | Search | `search-directory` | `themes.ehenho.pages.search.by_age` | `GET /tim-ban-theo-tuoi/{age?}` | `SearchController@byAge` |
| 5 | `profile-detail.html` | Profile | `profile-detail` | `themes.ehenho.pages.profile.detail` | `GET /ho-so/{slug_or_id}` | `ProfileController@show` |
| 6 | `signup.html` | Auth | `auth-register` | `themes.ehenho.pages.auth.register` | `GET /dang-ky` | `AuthController@showRegister` |
| 7 | `login.html` | Auth | `auth-login` | `themes.ehenho.pages.auth.login` | `GET /dang-nhap` | `AuthController@showLogin` |
| 8 | `logout.html` | Auth | `auth-logout` | `themes.ehenho.pages.auth.logout` | `POST /dang-xuat` | `AuthController@logout` |
| 9 | `password-reset.html` | Auth | `auth-password-reset` | `themes.ehenho.pages.auth.password_reset` | `GET /quen-mat-khau` | `ForgotPasswordController@show` |
| 10 | `password-change.html` | Account | `account-password-change` | `themes.ehenho.pages.account.password` | `GET /tai-khoan/doi-mat-khau` | `AccountController@changePassword` |
| 11 | `my-profile.html` | Account | `profile-my-view` | `themes.ehenho.pages.account.my_profile` | `GET /tai-khoan/ho-so` | `ProfileController@myProfile` |
| 12 | `profile-edit.html` | Account | `profile-edit` | `themes.ehenho.pages.account.profile_edit` | `GET /tai-khoan/chinh-sua-ho-so` | `ProfileController@edit` |
| 13 | `profile-options.html` | Account | `account-settings` | `themes.ehenho.pages.account.settings` | `GET /tai-khoan/cai-dat` | `AccountController@settings` |
| 14 | `upload-profile-pic.html` | Account | `profile-avatar-upload` | `themes.ehenho.pages.account.avatar_upload` | `GET /tai-khoan/anh-dai-dien` | `ProfileController@avatarUpload` |
| 15 | `inbox.html` | Messaging | `messages-inbox` | `themes.ehenho.pages.messages.inbox` | `GET /tin-nhan/hop-thu-den` | `MessageController@inbox` |
| 16 | `sent.html` | Messaging | `messages-sent` | `themes.ehenho.pages.messages.sent` | `GET /tin-nhan/tin-da-gui` | `MessageController@sent` |
| 17 | `message-view.html` | Messaging | `messages-thread-view` | `themes.ehenho.pages.messages.show` | `GET /tin-nhan/{conversationId}` | `MessageController@show` |
| 18 | `liked-profiles.html` | Social | `social-profile-list` | `themes.ehenho.pages.social.likes` | `GET /ket-noi/da-thich` | `SocialController@likes` |
| 19 | `bookmarked-profiles.html` | Social | `social-profile-list` | `themes.ehenho.pages.social.bookmarks` | `GET /ket-noi/da-luu` | `SocialController@bookmarks` |
| 20 | `blocked-profiles.html` | Social | `social-profile-list` | `themes.ehenho.pages.social.blocked` | `GET /ket-noi/da-chan` | `SocialController@blocked` |
| 21 | `contactbook-profiles.html` | Social | `social-profile-list` | `themes.ehenho.pages.social.contacts` | `GET /ket-noi/danh-ba` | `SocialController@contacts` |
| 22 | `email-manager.html` | Account | `account-email-manager` | `themes.ehenho.pages.account.emails` | `GET /tai-khoan/quan-ly-email` | `AccountController@emails` |

---

## 6. DANH MỤC THÀNH PHẦN TÁI SỬ DỤNG (REUSABLE COMPONENT INVENTORY)

Từ 22 trang HTML, đã bóc tách chính xác 10 thành phần giao diện dùng chung:
1. `header-navbar`: Header navigation bar chứa logo, thanh điều hướng, nút Đăng nhập / Đăng ký và avatar user khi đã authenticated.
2. `footer-main`: Footer tiêu chuẩn với copyright, liên kết điều khoản sử dụng, chính sách riêng tư và email hỗ trợ.
3. `account-sidebar-menu`: Menu dọc điều hướng trung tâm thành viên (Hồ sơ, Hộp thư, Danh bạ, Đổi mật khẩu, Cài đặt).
4. `profile-card`: Khối hiển thị tóm tắt một thành viên (Avatar, tên, tuổi, địa chỉ, nghề nghiệp, nút like/lưu).
5. `search-filter-box`: Form lọc tìm kiếm nâng cao đa tiêu chí (Giới tính, khoảng tuổi min-max, Tỉnh/Thành phố nạp qua JSON).
6. `hero-carousel`: Banner trượt hiển thị hình ảnh và thành viên nổi bật tại trang chủ.
7. `message-row-item`: Hàng hiển thị danh sách tin nhắn (Người gửi, tiêu đề, tóm tắt nội dung, trạng thái đã đọc/chưa đọc, thời gian).
8. `password-toggle-widget`: Nút bấm ẩn/hiện mật khẩu tương tác jQuery `mask-pw` nguyên bản.
9. `pagination-controls`: Bộ phân trang Bootstrap chuẩn (Trang trước, số trang, Trang sau).
10. `modal-dialog`: Khung popup xác nhận tác vụ (Xóa thư, chặn thành viên, báo cáo vi phạm).

---

## 7. ĐẶC TẢ KIẾN TRÚC MULTI-PROJECT & MULTI-DATABASE MỤC TIÊU

```text
                               ┌────────────────────────────────────────────────────────┐
                               │                    HTTP Request                        │
                               │           (Domain / Subdomain / Path Prefix)           │
                               └───────────────────────────┬────────────────────────────┘
                                                           │
                                                           ▼
                               ┌────────────────────────────────────────────────────────┐
                               │               ProjectResolver Middleware               │
                               │  1. Check Domain: ehenho.vn / viettinmart.vn           │
                               │  2. Check Subdomain: ehenho.core.local                 │
                               │  3. Check Path Prefix: /{projectCode}                  │
                               └───────────────────────────┬────────────────────────────┘
                                                           │
                                                           ▼
                               ┌────────────────────────────────────────────────────────┐
                               │                     ProjectContext                     │
                               │  - Current Project Entity (id, code, name, domain)     │
                               │  - Tenant Entity & Status                              │
                               │  - Project Database Configuration                      │
                               │  - Active Theme ID ('ehenho', 'viettinmartdemo', etc.) │
                               └──────────────┬──────────────────────────┬──────────────┘
                                              │                          │
                      ┌───────────────────────┘                          └────────────────────────┐
                      ▼                                                                           ▼
┌───────────────────────────────────────────────┐                       ┌───────────────────────────────────────────────┐
│              DatabaseResolver                 │                       │                 ThemeResolver                 │
│  - Kiểm tra mode: Isolated DB vs Shared DB    │                       │  - Nhận active theme từ ProjectContext        │
│  - Nếu Project DB riêng: Tạo dynamic PDO conn │                       │  - Khai báo Namespace View: `themes::{theme}` │
│    'project_{code}' an toàn theo request scope│                       │  - Nạp asset tương ứng từ public/themes/      │
│  - Purge & disconnect khi kết thúc request    │                       │  - Không can thiệp hoặc ghi đè global CSS     │
└─────────────────────┬─────────────────────────┘                       └───────────────────────┬───────────────────────┘
                      │                                                                         │
                      ▼                                                                         ▼
┌───────────────────────────────────────────────┐                       ┌───────────────────────────────────────────────┐
│               Model Scoping                   │                       │                 Blade Rendering               │
│  - Central Models (Project, User, Role):      │                       │  - Layout: `layouts.app` / `layouts.account`   │
│    Kết nối 'mysql' (Central DB)               │                       │  - Reusable Components                        │
│  - Project Models (Profile, Message, Post):   │                       │  - 100% Zero Visual Regression so với HTML    │
│    Kết nối dynamic 'project'                  │                       │  - Dữ liệu binding động từ Controller / Model │
└───────────────────────────────────────────────┘                       └───────────────────────────────────────────────┘
```

### 7.1. Phân định Ranh giới Dữ liệu (Data Boundaries)
* **Central Database (`core`):**
  * `projects`: Đăng ký tất cả các project, cấu hình domain, theme gán, trạng thái, config deployment cPanel.
  * `tenants`: Định danh tenant, database connection profile, timezone, locale.
  * `project_settings`: Cấu hình hệ thống chung hoặc fallback settings.
  * `users` (Hệ thống SuperAdmin / Agency kỹ thuật): Quản trị viên trung tâm điều phối toàn bộ tenant.
* **Project Database (`core_{projectCode}` hoặc Isolated Schema):**
  * `profiles`: Thông tin cá nhân, tiểu sử, ngày sinh, chiều cao, hôn nhân, tìm kiếm đối tượng.
  * `user_members`: Tài khoản người dùng riêng của từng website (thành viên đăng ký hẹn hò của eHenho độc lập hoàn toàn với khách hàng mua hàng của Viettinmart/WKComputer).
  * `messages` & `conversations`: Hộp thư, tin nhắn trao đổi nội bộ của project.
  * `user_social_connections`: Lượt thích (likes), đánh dấu (bookmarks), danh bạ (contacts), danh sách chặn (blocks).
  * `pages`: Nội dung tĩnh của dự án (Giới thiệu, Điều khoản, Quy chế).
  * `media_files`: Thư viện ảnh upload riêng của project.

---

## 8. PHÂN TÍCH RỦI RO & BIỆN PHÁP PHÒNG NGỪA (RISK ASSESSMENT)

| Mức Độ Rủi Ro | Loại Rủi Ro | Chi Tiết Nguy Cơ | Biện Pháp Kiểm Soát & Khắc Phục |
| :---: | :--- | :--- | :--- |
| **HIGH** | Connection Leakage (Rò rỉ kết nối DB) | Gọi `DB::setDefaultConnection()` toàn cục trong môi trường PHP-FPM / Octane có thể khiến request sau đọc nhầm connection của request trước. | Không đổi kết nối mặc định toàn cục vĩnh viễn; sử dụng Middleware `terminating` hook để `DB::purge('project')` và trả về Central connection ngay sau mỗi request. |
| **HIGH** | Cross-Project Data Leak (Lộ lọt dữ liệu chéo) | Người dùng của Project A có thể truy cập hoặc xem tin nhắn của Project B nếu Model không ràng buộc connection/tenant scope. | Áp dụng Base Model chuyên biệt cho Project (`ProjectScopedModel`) tự động trỏ về `connection = 'project'` và kiểm tra quyền sở hữu ID. Viết test case `tests/Feature/MultiProjectDatabaseTest.php` xác nhận dữ liệu độc lập 100%. |
| **MEDIUM** | CSS Style Collision (Xung đột giao diện) | Bootstrap 3.3.6 của theme `ehenho` có thể xung đột với Tailwind CSS v4 của hệ thống Admin/Core. | Toàn bộ CSS của theme `ehenho` được đóng gói và nạp có chủ đích qua namespace `public/themes/ehenho/css/`, chỉ include trong theme layout của `ehenho`, tuyệt đối không include vào bundle CSS toàn cục của Core. |
| **MEDIUM** | Hardcoded Static Content | Dữ liệu HTML tĩnh nếu giữ nguyên trong Blade sẽ khiến website không thể quản trị qua CMS. | Đã tạo [data/content-map.json](file:///c:/MAMP/htdocs/core/VGTDemo/data/content-map.json) bóc tách toàn bộ field động (tiêu đề, hồ sơ, bộ lọc, tin nhắn) để truyền từ Controller/Model. |
| **LOW** | Form Token & CSRF Incompatibility | Các form HTML gốc sử dụng cookie Django `csrftoken` sẽ gây lỗi 419 Page Expired trên Laravel. | Thay thế toàn bộ thẻ form HTML sang directive `@csrf` của Blade; cập nhật script AJAX gửi header `X-CSRF-TOKEN`. |

---

## 9. KẾT LUẬN & ĐỀ XUẤT BƯỚC TIẾP THEO

Quá trình quét và phân tích PHASE 3 đã hoàn tất 100% các tiêu chí:
1. Đã kiểm tra và cập nhật quy chuẩn phát triển theo đúng chỉ đạo của người dùng:
   * [sdlc_rules.md](file:///c:/MAMP/htdocs/core/VGTDemo/.antigravity/rules/sdlc_rules.md): Linh hoạt tech stack styling theo từng theme folder (cho phép Bootstrap/Vanilla CSS ở theme, Tailwind ở Core), quy định PHP là ngôn ngữ Backend chính, việc sử dụng Python bắt buộc phải có sự xác nhận từ USER.
   * [coder.md](file:///c:/MAMP/htdocs/core/VGTDemo/.antigravity/agents/coder.md): Đã bổ sung ràng buộc Backend PHP và phê duyệt Python.
2. Đã tạo đầy đủ 14 tệp dữ liệu máy đọc tại thư mục `data/`:
   * [page-inventory.json](file:///c:/MAMP/htdocs/core/VGTDemo/data/page-inventory.json), [page-matrix.json](file:///c:/MAMP/htdocs/core/VGTDemo/data/page-matrix.json), [template-matrix.json](file:///c:/MAMP/htdocs/core/VGTDemo/data/template-matrix.json)
   * [component-matrix.json](file:///c:/MAMP/htdocs/core/VGTDemo/data/component-matrix.json), [asset-matrix.json](file:///c:/MAMP/htdocs/core/VGTDemo/data/asset-matrix.json), [javascript-matrix.json](file:///c:/MAMP/htdocs/core/VGTDemo/data/javascript-matrix.json)
   * [laravel-environment.json](file:///c:/MAMP/htdocs/core/VGTDemo/data/laravel-environment.json), [laravel-routes.json](file:///c:/MAMP/htdocs/core/VGTDemo/data/laravel-routes.json), [laravel-models.json](file:///c:/MAMP/htdocs/core/VGTDemo/data/laravel-models.json)
   * [laravel-controllers.json](file:///c:/MAMP/htdocs/core/VGTDemo/data/laravel-controllers.json), [database-schema.json](file:///c:/MAMP/htdocs/core/VGTDemo/data/database-schema.json), [live-database-inspection.json](file:///c:/MAMP/htdocs/core/VGTDemo/data/live-database-inspection.json)
   * [html-to-laravel-route-map.json](file:///c:/MAMP/htdocs/core/VGTDemo/data/html-to-laravel-route-map.json), [project-matrix.json](file:///c:/MAMP/htdocs/core/VGTDemo/data/project-matrix.json), [theme-matrix.json](file:///c:/MAMP/htdocs/core/VGTDemo/data/theme-matrix.json), [content-map.json](file:///c:/MAMP/htdocs/core/VGTDemo/data/content-map.json), [deprecated-candidates.json](file:///c:/MAMP/htdocs/core/VGTDemo/data/deprecated-candidates.json).
3. Đã giữ vững nguyên tắc Zero-Code phá hoại: Không tự ý xóa code cũ, không mock fake data, không viết code đè lên hệ thống khi chưa có sự phê duyệt kế hoạch kiến trúc.
