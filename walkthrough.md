# Walkthrough: SuperAdmin API Hub & CMS Dashboard Rebuild

Đã hoàn thành xuất sắc toàn bộ các hạng mục theo **Implementation Plan đã duyệt** tuân thủ nghiêm ngặt quy tắc **CodeX Master Control** (Scan First → Plan → Approval → Implement → Test), bảo toàn 100% tính năng export database và deploy dự án, đồng thời nâng cấp toàn diện giao diện Bảng điều khiển Quản trị (CMS Dashboard) theo tiêu chuẩn `@public_html`.

---

## 1. Các hạng mục đã thực hiện

### A. SuperAdmin API Hub (`/superadmin/projects/{project}/config#api`)
- **Tập trung hóa cấu hình API**:
  - Tích hợp tab **"API Hub & Tích hợp"** trực tiếp tại trang Cấu hình Dự án của SuperAdmin.
  - Tổ chức 5 phân nhóm chuyên biệt:
    1. **Remote Bridge & Connection**: Đồng bộ cấu hình qua API Token / Remote Project URL.
    2. **AI Providers (Trí tuệ nhân tạo)**: Hỗ trợ OpenAI (`api.openai_key`), Google Gemini (`api.gemini_key`), chọn Model mặc định (`gpt-4o-mini`, `gemini-1.5-flash`, etc.).
    3. **Payment Gateways (Cổng thanh toán)**: VietQR (`bank_id`, `account_no`, `account_name`, `template`), MoMo (`partner_code`, `access_key`, `secret_key`), VNPay (`tmn_code`, `hash_secret`).
    4. **Shipping Carriers (Vận chuyển)**: Giao Hàng Nhanh (`ghn_token`, `ghn_shop_id`), Giao Hàng Tiết Kiệm (`ghtk_token`).
    5. **Notifications & Webhooks**: Telegram Bot Token & Chat ID báo đơn hàng tự động, Custom Webhook URL & Secret.
- **Cơ chế lưu trữ & Đồng bộ**:
  - Lưu vào bảng `project_settings` (`project_id`, `key`, `value`).
  - Đồng bộ tự động sang bảng `settings` (`key`, `payload`, `project_id`) để các theme frontend / website con đọc được ngay lập tức.
  - Tự động gọi `RemoteProjectService::updateRemoteConfig()` nếu dự án có cấu hình `remote_url`.

### B. Bảo đảm Export Database & Deploy (`database_{projectCode}.sql`)
- Mở rộng danh sách whitelist trong `ProjectExportController::getCmsTableWhitelist()`:
  - Bổ sung: `coupons`, `flash_sale_campaigns`, `flash_sale_items`, `agents`, `user_addresses`, `form_templates`, `modal_forms`.
  - Giữ nguyên cấu trúc đóng gói source ZIP và file `.sql` snapshot.
  - Cập nhật tương thích database driver (MySQL / MariaDB trên Production và SQLite trên Test environment) giúp toàn bộ quá trình export database luôn hoạt động ổn định và chính xác.

### C. Tái thiết Bảng điều khiển CMS (`/{projectCode}/admin`)
- **Backend Controller (`App\Http\Controllers\Admin\DashboardController`)**:
  - Loại bỏ toàn bộ các số `0` hardcoded trước đây.
  - Thay thế bằng các câu truy vấn Eloquent tổng hợp số liệu thực tế được cô lập tuyệt đối theo `project_id`:
    - **Order Pipeline**: `unassigned_orders`, `pending_orders`, `processing_orders`, `shipping_orders`, `completed_today`.
    - **Doanh thu**: `today_revenue`, `monthly_revenue`, `total_revenue`, `revenue_3m`, `revenue_6m`.
    - **Đơn hàng & Khách hàng**: `total_orders`, `today_orders`, `total_customers`, `new_users_today`.
    - **Sản phẩm & Tồn kho**: `total_products`, `active_products`, `out_of_stock_products` (&le; 5 sp).
    - **Biểu đồ 7 ngày**: Tính toán doanh thu và số lượng đơn hàng theo từng ngày trong 7 ngày qua.
    - **Khách hàng VIP (CRM Top Buyers)**: Top khách hàng mua nhiều nhất kèm số điện thoại để Sale chăm sóc.
- **Frontend View (`resources/views/cms/dashboard/index.blade.php`)**:
  - Giao diện hiện đại, kế thừa trọn vẹn trải nghiệm từ `@public_html`.
  - **Hub Status Pills**: Hiển thị trạng thái kết nối các dịch vụ từ SuperAdmin API Hub (VietQR, AI Bot, Vận chuyển, Telegram).
  - **Tiến độ Vận hành Đơn hàng (5-Stage Pipeline Hub)**:
    - *Chờ xác nhận*: Count badge, link trực tiếp đến danh sách lọc `status=pending`.
    - *Cần phân bổ*: Cảnh báo màu đỏ nổi bật.
    - *Đang xử lý*: Trạng thái đóng gói và kiểm hàng kho.
    - *Đang giao*: Vận đơn giao hàng.
    - *Xong hôm nay*: Tổng kết đơn hoàn tất trong ngày.
  - **Bộ thẻ KPI Tài chính & Vận hành**: Doanh thu hôm nay, Tháng này, Tổng đơn, CRM khách hàng, Cảnh báo kho.
  - **Quick Action Bar**: Tạo đơn hàng nhanh, Thêm sản phẩm, Viết bài, Cấu hình cửa hàng.
  - **Biểu đồ kép Chart.js**: Biểu đồ đường doanh thu (với vùng đổ gradient mềm mại) và biểu đồ cột số lượng đơn.
  - **Bảng dữ liệu thực**: Đơn hàng mới nhất, Top 5 sản phẩm bán chạy, Cảnh báo sản phẩm sắp hết hàng, Bảng khách VIP.

---

## 2. Kết quả Kiểm thử & Xác thực (Verification Results)

### Kiểm thử Tính năng Mới
1. **SuperAdmin API Hub & Database Export Test**:
   ```bash
   php artisan test --compact tests/Feature/SuperAdmin/ProjectApiHubTest.php
   ```
   **Kết quả**: `3 passed (24 assertions)`
   - `test_superadmin_can_view_api_hub_tab`: PASSED
   - `test_superadmin_can_save_api_keys_with_strict_project_isolation`: PASSED
   - `test_superadmin_can_export_database_with_project_isolation_and_settings`: PASSED

2. **CMS Dashboard Order Pipeline & Tenant Isolation Test**:
   ```bash
   php artisan test --compact tests/Feature/Admin/DashboardPipelineTest.php
   ```
   **Kết quả**: `1 passed (17 assertions)`
   - Pipeline Hub hiển thị chính xác theo từng trạng thái đơn hàng.
   - Doanh thu được tính toán chính xác 100%.
   - API Hub integration flags phản ánh đúng cấu hình.
   - **Cách ly tuyệt đối**: Dữ liệu và đơn hàng của Project B không bao giờ rò rỉ sang Project A.

3. **Toàn bộ Test Suite SuperAdmin**:
   ```bash
   php artisan test --compact tests/Feature/SuperAdmin/
   ```
   **Kết quả**: `27 passed (140 assertions)` - Toàn bộ 27 bài kiểm tra SuperAdmin vượt qua.

4. **Kiểm tra Cách ly Đa dự án (Multisite Regression)**:
   ```bash
   php artisan test --compact tests/Feature/MultisiteTenantIsolationTest.php tests/Feature/WkcomputerIsolationTest.php
   ```
   **Kết quả**: `13 passed (32 assertions)` - Không phát sinh bất kỳ lỗi hồi quy nào.

5. **Code Style & Formatting**:
   - Đã chạy Pint trên các file chỉnh sửa, đảm bảo chuẩn code PSR-12 và Laravel 12.
