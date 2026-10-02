# KẾ HOẠCH TRIỂN KHAI & DI TRÚ – PHASE 3 (MIGRATION PLAN)
## LỘ TRÌNH CHUYỂN ĐỔI TỪ STATIC HTML SANG PRODUCTION THEME TRÊN LARAVEL CORE

> **Cam kết chất lượng:** Không phá hủy bất kỳ thành phần mã nguồn hiện hữu nào (`Viettinmart`, `WKComputer`, `SuperAdmin`). Mọi bước di trú đều có thể hoàn tác (Rollback) an toàn thông qua Git checkpoint và tuân thủ tuyệt đối quy chuẩn kiểm thử tự động.

---

## 1. NGUYÊN TẮC BẢO TOÀN (ZERO-DESTRUCTION MANDATE)

* **Không xóa tệp:** Nghiêm cấm xóa hoặc ghi đè các Controller, Model, Migration hiện có của hệ thống SuperAdmin và các dự án Site A (`Viettinmart`), Site B (`WKComputer`).
* **Bảo toàn giao diện (Zero Visual Regression):** Đảm bảo giao diện Blade sau khi nạp động đạt độ tương đồng 100% so với bản HTML tĩnh tại `@public/e-henho`.
* **Không nạp Mock Data:** Hiển thị trạng thái dữ liệu trống thực tế (Empty State) nếu database chưa có bản ghi, tuyệt đối không chèn dữ liệu giả (fake/mock) vào mã nguồn Blade.
* **Ngôn ngữ Backend chính là PHP:** Tuân thủ quy định [sdlc_rules.md](file:///c:/MAMP/htdocs/core/VGTDemo/.antigravity/rules/sdlc_rules.md) và [coder.md](file:///c:/MAMP/htdocs/core/VGTDemo/.antigravity/agents/coder.md), toàn bộ mã nguồn xử lý backend được viết bằng PHP 8.2 (Laravel Framework); không dùng Python nếu chưa có sự xác nhận từ USER.

---

## 2. LỘ TRÌNH THỰC THI CHI TIẾT (IMPLEMENTATION PHASES)

### Giai đoạn 1: Thiết Lập Hạ Tầng Điều Phối Tenancy (Context & Resolvers)
1. **Tạo Bộ Phân Giải Project:** `app/Services/Tenancy/ProjectResolver.php`.
2. **Tạo Bộ Điều Phối Kết Nối Database:** `app/Services/Tenancy/DatabaseResolver.php`.
3. **Tạo Bộ Điều Phối Giao Diện Theme:** `app/Services/Tenancy/ThemeResolver.php`.
4. **Đăng ký Middleware Hợp Nhất:** `ResolveProjectContext` kết nối chuỗi xử lý:
   ```text
   Identify Request -> Resolve Project -> Switch Database -> Register Theme Namespace
   ```
5. **Cấu hình Terminating Cleanup:** Giải phóng connection `project` khi kết thúc request để chống leak state.

### Giai đoạn 2: Khởi Tạo Dự Án Mẫu eHenho Trong Central Database
1. Thêm bản ghi đăng ký Project `ehenho` vào bảng `projects` (code: `ehenho`, name: `eHenho Dating & Social Network`).
2. Thêm bản ghi tương ứng vào bảng `tenants` với `database_name = 'core_ehenho'` và settings `{"theme": "ehenho"}`.
3. Thiết lập baseline migration cho Project Database:
   * Bảng `profiles`: Hồ sơ hẹn hò, tìm kiếm bạn đời.
   * Bảng `messages` & `conversations`: Hộp thư trao đổi tin nhắn.
   * Bảng `user_social_connections`: Lượt thích, lưu thẻ, chặn người dùng, danh bạ.

### Giai đoạn 3: Tổ Chức Tài Nguyên Giao Diện & Assets (Asset Isolation)
1. Tạo thư mục public theme: `public/themes/ehenho/`
2. Di chuyển có chọn lọc:
   * `public/e-henho/css/*` $\rightarrow$ `public/themes/ehenho/css/`
   * `public/e-henho/js/*` $\rightarrow$ `public/themes/ehenho/js/`
   * 95 ảnh giao diện cốt lõi $\rightarrow$ `public/themes/ehenho/images/`
   * `public/e-henho/icons/*` $\rightarrow$ `public/themes/ehenho/icons/`
3. Giữ nguyên bản gốc tại `public/e-henho/` làm mốc đối chiếu kiểm thử visual regression.

### Giai đoạn 4: Chuyển Đổi HTML Sang Blade (Component & Template Assembly)
1. **Xây dựng 3 Layouts cơ sở:**
   * `resources/views/themes/ehenho/layouts/app.blade.php`
   * `resources/views/themes/ehenho/layouts/frontend.blade.php`
   * `resources/views/themes/ehenho/layouts/account.blade.php`
2. **Xây dựng 10 Reusable Blade Components:**
   * `header.blade.php`, `footer.blade.php`, `account-sidebar.blade.php`, `profile-card.blade.php`
   * `search-filter.blade.php`, `hero-carousel.blade.php`, `message-row.blade.php`, `password-toggle.blade.php`, v.v.
3. **Chuyển đổi 22 tệp HTML thành Blade Views chuẩn hóa:**
   * Thay thế cookie CSRF Django cũ bằng `@csrf`.
   * Thay thế các đường dẫn tĩnh `.html` bằng helper `route()`.
   * Gắn các slot dữ liệu động theo ma trận [content-map.json](file:///c:/MAMP/htdocs/core/VGTDemo/data/content-map.json).

### Giai đoạn 5: Routing & Controller Implementation
1. Tạo file route chuyên biệt: `routes/themes/ehenho.php` nạp dưới middleware `['web', 'resolve.project']`.
2. Tạo Controllers chuyên biệt trong namespace `App\Http\Controllers\Themes\Ehenho\`:
   * `HomeController.php`: Trang chủ & Thành viên mới.
   * `SearchController.php`: Tìm bạn bốn phương theo tiêu chí và độ tuổi.
   * `ProfileController.php`: Chi tiết hồ sơ, xem/sửa hồ sơ, tải ảnh đại diện.
   * `MessageController.php`: Hộp thư đến, thư đã gửi, luồng hội thoại.
   * `SocialController.php`: Danh sách thích, đánh dấu, danh bạ, danh sách chặn.
   * `AuthController.php`: Đăng nhập, đăng ký, đăng xuất.
   * `AccountController.php`: Đổi mật khẩu, quản lý email, thiết lập riêng tư.

---

## 3. KỊCH BẢN KIỂM THỬ TỰ ĐỘNG (AUTOMATED TEST SUITE)

Để đảm bảo toàn bộ hệ thống hoạt động ổn định và đáp ứng 100% Acceptance Criteria:

1. **MultiProjectDatabaseTest (`tests/Feature/MultiProjectDatabaseTest.php`):**
   * Kiểm tra khi gọi `Project A` (Viettinmart) $\rightarrow$ Hệ thống truy vấn đúng database và dữ liệu của Viettinmart.
   * Kiểm tra khi gọi `Project C` (eHenho) $\rightarrow$ Hệ thống trỏ đúng connection `project` độc lập.
   * Kiểm tra không có rò rỉ dữ liệu hoặc session chéo giữa các project.
2. **ThemeResolutionTest (`tests/Feature/ThemeResolutionTest.php`):**
   * Kiểm tra khi truy cập qua host hoặc route của `ehenho` $\rightarrow$ Hệ thống render đúng views trong `resources/views/themes/ehenho/`.
   * Kiểm tra khi truy cập `wkcomputer` $\rightarrow$ Render đúng view dark theme của `wkcomputerdemo`.
3. **VisualRegressionTest:**
   * So sánh DOM và giao diện render giữa `public/e-henho/index.html` và route `/` của theme `ehenho`.
   * Đảm bảo không vỡ layout, không thiếu CSS/JS assets.

---

## 4. CHECKPOINT ROLLBACK BẢO MẬT (GIT RESTORE POINT)

Trước khi tiến hành viết code ở các bước tiếp theo, toàn bộ trạng thái hệ thống được bảo tồn qua Git:

```bash
git status
git add .antigravity/ docs/ data/ scripts/
git commit -m "docs: complete Phase 3 scan, mapping matrices, and architecture specification"
```

Khi cần rollback hoàn toàn:
```bash
git reset --hard HEAD
```
