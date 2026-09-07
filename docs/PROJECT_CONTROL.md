# PROJECT CONTROL DOCUMENT

**SINGLE SOURCE OF TRUTH (SSOT)**  
**Platform**: Laravel 12 Multisite Core + Admin CMS  
**Status**: LOCKED FOR IMPLEMENTATION (Requires Approval Before Code Execution)  
**Revision**: 1.0.0  
**Date**: 2026-09-07  

---

## 1. PROJECT OBJECTIVE

Build, modernize, and maintain a robust, multi-tenant enterprise e-commerce platform running on a single unified Laravel 12 core hosting multiple distinct storefronts:
1. **Site A**: `Viettinmart Ecommerce` (`viettinmart-eco`, Project ID: 10, Tenant ID: 3) – Clean grocery and retail ecommerce.
2. **Site B**: `WKComputer Gaming & PC` (`wkcomputer`, Project ID: 14, Tenant ID: 4) – High-performance PC builder, hardware, gaming gear, and tech retail.

### Core Goals:
- **Strict Multi-Tenant Isolation**: Zero cross-tenant data leaks at middleware, query, admin, and session layers.
- **Admin CMS Feature Parity**: Both tenants have complete access to all CMS modules (Catalog, Orders, Reviews, Form Submissions, Menus, Media, Widgets, and 21 Settings modules).
- **Vanilla HTML/Blade Frontend Preservation**: 100% pure Laravel Blade templates with vanilla HTML/CSS/JS. No unwanted SPA or frontend framework conversions (strictly NO React, Vue, or Next.js for storefront views).
- **Zero Scope Creep**: Every task is tied to explicit task IDs, auditable, and programmatically tested.

---

## 2. IN SCOPE

1. **Multisite Routing & Context Resolution**:
   - URL path prefix routing (`/viettinmart-eco/*`, `/wkcomputer/*`).
   - Tenant middleware pipeline (`ProjectSubdomainMiddleware`, `WkcomputerMiddleware`, `SetProjectDatabase`, `CheckCmsRole`).
   - Session & request attribute context propagation (`current_project_id`, `current_tenant_id`).
2. **Database Scoping**:
   - Model tenant traits (`BelongsToTenant`, `ProjectScoped`) applying global query scopes on `project_id` and `tenant_id`.
   - Bidirectional catalog synchronization between enhanced ecommerce tables (`products_enhanced`, `product_categories`) and CMS content tables (`posts`, `taxonomies`).
3. **Admin CMS Parity**:
   - Products (CRUD, image galleries, variants, attributes, category assignment).
   - Categories (Nested hierarchy, parent-child relations, SEO slug generation).
   - Brands (CRUD, logos, descriptions).
   - Attributes & Values (Color, storage, specs mapping).
   - Orders (Order listing, status updates, invoice printing, customer association).
   - Form Submissions (Contact form capture, anti-XSS sanitization, status updates, detail review).
   - Reviews (Customer reviews, rating, approval status, moderation).
   - Menus (Header/Footer menu tree builder, menu items).
   - Media Library (Folder creation, asset upload, delete, association).
   - Widgets (Dynamic widget placement, repeatable fields, area rendering).
   - 21 Settings Modules (General, Contact, Social, SEO, Payment, Shipping, Fonts, etc.).
4. **Storefront Frontend Experience**:
   - Viettinmart: Widget-based homepage (`homepage-main`), grocery layout, product detail, checkout.
   - WKComputer: Custom dark-themed hardware layout, Hero slider, Build PC tool, Cart, Checkout, Showrooms.
5. **Quality & Verification**:
   - Automated PHPUnit feature tests for tenant isolation and CMS parity.
   - Automated HTTP route audits.
   - Code styling compliance via Laravel Pint.

---

## 3. OUT OF SCOPE

The following items are strictly OUT OF SCOPE and must not be implemented without prior written authorization:
1. **Frontend Framework Conversions**: Converting any Blade template to React, Vue, Next.js, or Nuxt.
2. **Destructive Database Operations**: Running `migrate:fresh`, `db:wipe`, dropping tables, or deleting production tenant data.
3. **Duplicate Architectural Subsystems**: Creating separate redundant product/category tables or second parallel CMS admin panels.
4. **SuperAdmin Agency HR/Operations Core**: Modifying agency internal contracts, employee salary, timesheets, briefs, or tickets unrelated to tenant ecommerce.
5. **External Live Payment Gateways**: Integrating live banking production APIs (e.g. live VietQR/VNPAY/Momo webhooks) without merchant production credentials.
6. **Arbitrary Refactoring**: Modifying working components that are outside the current task scope.

---

## 4. CURRENT ARCHITECTURE

- **Core Framework**: Laravel 12.0.x on PHP 8.2.14.
- **Frontend Stack**: Pure Blade templates, Tailwind CSS v4, Livewire v4, Volt v1, Flux UI (Free).
- **Backend Architecture**:
  - MVC structure partitioned by namespaces (`App\Http\Controllers\Admin`, `App\Http\Controllers\Wkcomputer`, `App\Http\Controllers\Viettinmart`).
  - Shared Service Layer: `SettingsService`, `WidgetRegistry`, `WidgetPermissionService`, `WkcomputerDeployService`.
- **Database Partitioning Model**: Shared single database schema with column-level tenant scoping (`project_id` and `tenant_id`).
- **Web Server Layer**: Local MAMP Apache / PHP built-in server on Windows.

---

## 5. FRONTEND LOCATION

- **Storefront Blade Views**:
  - Site A (Viettinmart): `resources/views/frontend/themes/viettinmartdemo/`
  - Site B (WKComputer): `resources/views/frontend/themes/wkcomputerdemo/`
  - Shared Layouts & Components: `resources/views/components/`, `resources/views/layouts/`
- **Storefront Static Assets**:
  - Site A: `public/theme/`, `public/Front-end/`
  - Site B: `public/themes/wkcomputerdemo/` (`css/`, `js/`, `images/`)
  - Shared Vendor Assets: `public/vendor/`, `public/media-files/`

---

## 6. BACKEND

- **App Structure**: Standard Laravel 12 streamlined directory structure.
- **Routing**:
  - `routes/project.php`: Central multisite hub routing `/{projectCode}/admin/*`, dynamic pages, and tenant bootstrapping.
  - `routes/wkcomputer.php`: Dedicated WKComputer storefront and customer account routes.
  - `routes/viettinmart.php`: Dedicated Viettinmart storefront routes.
  - `routes/backend.php`: Legacy/global CMS routes.
  - `routes/superadmin.php`: Multi-tenant agency management.
- **Middleware**: Registered declaratively in `bootstrap/app.php` and route groups:
  - `ProjectSubdomainMiddleware`: Extracts project code and binds project model.
  - `WkcomputerMiddleware`: Configures WKComputer project context and prepends theme view path.
  - `SetProjectDatabase`: Injects tenant context, session variables, and database connections.
  - `CheckCmsRole`: Restricts CMS access to authorized project admins.

---

## 7. DATABASE

- **DBMS**: MySQL 8.0 (Local/Production) / SQLite `:memory:` (Automated testing).
- **Key Tables**:
  - Multisite: `projects`, `tenants`, `project_users`, `project_settings`, `settings`.
  - Catalog: `products_enhanced`, `posts`, `product_categories`, `taxonomies`, `product_variations`, `brands`, `product_attributes`, `product_attribute_values`.
  - Content: `widgets`, `widget_templates`, `menus`, `menu_items`, `archive_templates`.
  - Ecommerce: `orders`, `order_items`, `customers`, `coupons`, `shipping_rules`, `product_combos`.
  - Interactions: `form_submissions`, `reviews`, `activity_logs`.

---

## 8. MULTISITE TENANT SPECIFICATION

| Site | Project Code | Project ID | Tenant ID | Frontend Entry URL | Admin CMS URL | CMS Credentials |
| :--- | :--- | :--- | :--- | :--- | :--- | :--- |
| **Site A (Viettinmart)** | `viettinmart-eco` | `10` | `3` | `http://localhost:8000/viettinmart-eco` | `http://localhost:8000/viettinmart-eco/admin` | `viettinmart-eco` / `admin123` |
| **Site B (WKComputer)** | `wkcomputer` | `14` | `4` | `http://localhost:8000/wkcomputer` | `http://localhost:8000/wkcomputer/admin` | `wkcomputer` / `admin123` |

### Isolation Rules:
1. All queries for tenant data MUST be constrained by `project_id` and/or `tenant_id`.
2. Admin users from Project 10 MUST NOT access Project 14 URLs (enforced by `CheckCmsRole` -> HTTP 403).
3. Direct lookups of cross-tenant IDs (e.g. form submission ID belonging to Site A requested by Site B admin) MUST return HTTP 404.

---

## 9. ADMIN ARCHITECTURE

- Base URL: `/{projectCode}/admin`
- Shared Blade views in `resources/views/cms/` shared across both tenants.
- Dynamic data binding: All views receive data scoped to the active project session.
- 21 Modular Settings:
  1. General
  2. Contact
  3. Notifications
  4. Fonts
  5. Logs
  6. Analytics
  7. Watermark
  8. Table of Contents (TOC)
  9. Social Media
  10. Payment
  11. Shipping Engine
  12. AI Integration
  13. Reviews & Ratings
  14. Languages & Localization
  15. Custom Forms
  16. Contact Buttons
  17. URL Redirects
  18. SEO & Meta
  19. Popups
  20. Permissions & Roles
  21. Fake Notifications

---

## 10. BUSINESS MODULES

1. **Catalog Module**: Dual-sync support (`products_enhanced` <-> `posts`, `product_categories` <-> `taxonomies`).
2. **Order Processing**: Session cart -> Checkout form -> Order creation -> Status workflow (Pending -> Processing -> Shipped -> Completed -> Cancelled) -> Invoice print.
3. **PC Builder (WKComputer)**: Category-driven component configurator (`/wkcomputer/xay-dung-cau-hinh`) with instant price calculation and direct cart transfer.
4. **Dynamic Widget Engine**: Placement-based rendering (`homepage-main`, `header`, `footer`) with repeatable fields and fallback configurations.
5. **Customer Form Pipeline**: Web forms -> Anti-XSS sanitization -> DB persistence (`form_submissions`) -> Admin notification & review -> Status update.

---

## 11. TEST REQUIREMENTS

Every task or release must pass:
1. `tests/Feature/MultisiteTenantIsolationTest.php` (Tenant access boundaries & cross-tenant data shielding).
2. `tests/Feature/AdminCmsParityTest.php` (Feature parity across all CMS modules for both tenants).
3. `tests/Feature/WkcomputerIsolationTest.php` & `MultisiteIsolationTest.php`.
4. Automated HTTP route audit verifying HTTP 200 on all public and authenticated routes.
5. Code formatting verification via Laravel Pint (`vendor/bin/pint --dirty --format agent`).

---

## 12. ACCEPTANCE CRITERIA

A feature or task is accepted as **PASS** only if:
- [x] **Technical Pass**: No PHP fatal errors, zero unhandled 500 exceptions, valid HTML/JSON responses.
- [x] **Business Pass**: Full customer and admin lifecycle works (e.g. from homepage browse to cart to checkout to admin order detail).
- [x] **Admin Pass**: Admin can create, read, update, and delete entities without errors.
- [x] **Frontend Pass**: Storefront displays updated dynamic data without cache stale bugs or layout breakage.
- [x] **Multisite Pass**: Action performed on Site A produces ZERO effect or visibility on Site B.
- [x] **Security Pass**: Unauthorized requests return HTTP 403 or 404; inputs sanitized against SQLi and XSS.
