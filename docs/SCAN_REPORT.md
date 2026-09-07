# CODEX SYSTEM SCAN REPORT

**Audit Date**: 2026-09-07  
**Operating Environment**: Windows / Local MAMP / MySQL 8.0 / PHP 8.2.14 / Laravel 12  
**Audit Target**: `c:\MAMP\htdocs\core\VGTDemo`  
**Reference Codebase**: `@public_html` (`c:\MAMP\htdocs\core\VGTDemo\public_html`)  
**Project Control Status**: PROJECT_STATE = SCANNED  

---

## 1. PROJECT OVERVIEW
The application is an enterprise Multi-Tenant E-commerce and Agency Platform built on a unified Laravel 12 core. It serves two distinct live storefronts:
- **Site A (Viettinmart)**: `viettinmart-eco` (Project ID: 10, Tenant ID: 3) – Fresh grocery and retail FMCG store.
- **Site B (WKComputer)**: `wkcomputer` (Project ID: 14, Tenant ID: 4) – High-performance gaming PC builder & tech retail.
- **SuperAdmin Hub**: `http://localhost:8000/superadmin/` – Agency operations, project configuration, and multi-tenant management.

---

## 2. DOCUMENTATION FINDINGS (`@docs/**`)
12 core reference files were discovered in `docs/`:
- `PROJECT_CONTROL.md`: Master SSOT governing isolation, architecture, and scope limits.
- `SYSTEM_ARCHITECTURE_MAP.md`: Detailed end-to-end trace from browser to DB.
- `FEATURE_INVENTORY.md`: 29 cataloged features with verified test statuses.
- `HERO_AUDIT.md`: Dynamic Hero and Widget rendering specifications.
- `VTM_FEATURE_MATRIX.md` & `TEST_MATRIX.md`: Automated test matrices.
- `DASHBOARD_GAP_ANALYSIS.md`, `CRM_GAP_ANALYSIS.md`, `COMPONENT_INVENTORY.md`, `DISCOVERED_ISSUES.md`: Specialized gap analysis audits.

---

## 3. PUBLIC_HTML FINDINGS (`@public_html/**`)
`@public_html` is a standalone reference Laravel deployment containing:
- 1,707 application files (excluding vendor and node_modules).
- Complete operational Dashboard with 5-stage Order Pipeline Hub, Sales Analytics, Top/Slow-selling products, and Distributor/Agent performance.
- Standalone `.env` pointing to `viettinmartdemo_demo1` database.
- Serves as the source of truth for UI/UX interaction standards, information hierarchy, and ecommerce operations.

---

## 4. FRONTEND ARCHITECTURE
- Site A: Pure Blade templates under `resources/views/frontend/themes/viettinmartdemo/` with widgetized areas (`homepage-main`, `header`, `footer`).
- Site B: Custom gaming hardware layout under `resources/views/frontend/themes/wkcomputerdemo/` featuring interactive PC Builder (`/wkcomputer/xay-dung-cau-hinh`).
- Static assets: Strictly vanilla HTML/CSS/JS loaded from `public/theme/` and `public/themes/wkcomputerdemo/`.

---

## 5. ADMIN ARCHITECTURE
- Base URL: `/{projectCode}/admin` powered by routes in `routes/project.php`.
- Shared CMS views in `resources/views/cms/` partitioned dynamically by `project_id` and `tenant_id`.
- 21 Modular Settings: General, Contact, Notifications, Fonts, Logs, Analytics, Watermark, TOC, Social, Payment, Shipping, AI, Reviews, Languages, Custom Forms, Buttons, Redirects, SEO, Popups, Permissions, Fake Notifications.

---

## 6. CRM ARCHITECTURE
- `customers` & `users` management: Tracks customer identity, ID card, representative phone, and purchase histories.
- `form_submissions` pipeline: Sanitizes customer form submissions and inquiries with anti-XSS protection.
- `reviews`: Multi-site moderated customer reviews.
- Gap: Distributor/Agent CRM table (`agents`) exists in DB schema but lacks dedicated CMS administration views.

---

## 7. DASHBOARD ARCHITECTURE
- Current `App\Http\Controllers\Admin\DashboardController@projectDashboard` was returning hardcoded `0` values and empty collections (`collect()`).
- Reference `@public_html` includes: Order Pipeline Hub (5 stages), Revenue KPI cards (6m, 3m, 1m), Top Selling products with thumbnails, Slow Selling products with Flash Sale alerts, and Agent performance leaderboards.

---

## 8. DATABASE ARCHITECTURE
- 155 migrations executed, 79 Eloquent models defined.
- Shared schema with column-level tenant partitioning (`project_id` and `tenant_id`).
- Key dual-sync mapping: `products_enhanced` <-> `posts`, `product_categories` <-> `taxonomies`.

---

## 9. MULTISITE ARCHITECTURE
- Request pipeline: `ProjectSubdomainMiddleware` -> `WkcomputerMiddleware` -> `SetProjectDatabase` -> `CheckCmsRole`.
- Verified 100% tenant isolation across 25 automated feature tests (59 assertions).

---

## 10. PAGE BUILDER STATUS
- Controller: `App\Http\Controllers\Admin\PageBuilderController.php`.
- Routes: `routes/web.php` lines 180–190.
- **STATUS: PROTECTED MODULE**. Must be preserved without refactoring or structural modification.

---

## 11. EXISTING FEATURES
- Multi-tenant routing and query isolation.
- Complete Product Catalog (CRUD, attributes, variations, image galleries).
- 21 Settings modules.
- Order processing, cart, checkout, and invoice printing.
- Form submissions and customer review moderation.
- Dynamic widget registry and menu builder.
- SuperAdmin multi-project management.

---

## 12. MISSING FEATURES
- Centralized Third-Party API Key management in `superadmin.projects.config`.
- Order Pipeline Hub in CMS Dashboard.
- Admin UI for Agents/Distributors (`agents` table).
- Admin UI for Flash Sale campaigns and coupons.

---

## 13. BROKEN FEATURES
- None (All 25 existing tests pass cleanly).

---

## 14. DUPLICATE SYSTEMS
- None created. Database and routes maintain unified single definitions.

---

## 15. HARDCODED SYSTEMS
- Dashboard statistics in `DashboardController@projectDashboard` (currently hardcoded zeros, requiring real tenant-scoped Eloquent aggregates).

---

## 16. UI PROBLEMS
- Current CMS Dashboard has low informational density compared to standard reference in `@public_html`.

---

## 17. UX PROBLEMS
- SuperAdmin has to manually adjust child `.env` or database rows to update third-party API keys instead of configuring them in the SuperAdmin config UI.

---

## 18. DATA PROBLEMS
- No data integrity issues found. All migrations and seeders execute cleanly.

---

## 19. SECURITY RISKS
- API Tokens must be checked via constant-time comparison (`hash_equals`) in all bridge endpoints (already implemented in `ProjectBridgeController`).

---

## 20. PERFORMANCE RISKS
- Dashboard queries should use short-lived cache (`Cache::remember`) with tenant-specific keys (e.g. `dashboard_stats_{project_id}`).

---

## 21. INTEGRATION GAPS
- Need a bi-directional configuration pipeline: SuperAdmin UI -> `project_settings` / `RemoteProjectService` -> Child Source API Bridge.

---

## 22. RECOMMENDED PRIORITIES
1. **PRIORITY 1**: Implement Centralized API Key Management in SuperAdmin (`superadmin.projects.config`) so agency admins can point and push API configurations (AI, Payment, Shipping, Webhooks) to child projects.
2. **PRIORITY 2**: Upgrade CMS Dashboard (`cms.dashboard.index`) to incorporate the Order Pipeline Hub, real-time revenue analytics, and top-selling product widgets from `@public_html`.
3. **PRIORITY 3**: Connect Agent / Distributor and Coupon CMS management panels to activate remaining ecommerce workflows.
