# CODEX IMPLEMENTATION PLAN

**Platform**: Laravel 12 Multisite Core + Admin CMS  
**Date**: 2026-09-07  
**Status**: PENDING APPROVAL (LOCKED - NO CODE EXECUTION BEFORE USER APPROVAL)  

---

## 1. TASK MATRIX

| Task ID | Component | Summary | Status |
| :--- | :--- | :--- | :--- |
| **API-001** | SuperAdmin | Centralized API Key & Integration Configuration Hub | **PENDING APPROVAL** |
| **API-002** | Bridge Service | Remote / Local Child Project API Configuration Sync Handshake | **PENDING APPROVAL** |
| **DASH-001** | CMS Dashboard | Rebuild Order Pipeline Hub & Analytics from `@public_html` | **PENDING APPROVAL** |
| **CRM-001** | CMS CRM | Agent & Distributor Operations Management Panel | **PENDING APPROVAL** |
| **CRM-002** | CMS Ecommerce | Coupon & Flash Sale Promotion Management | **PENDING APPROVAL** |

---

## 2. DETAILED TASK SPECIFICATIONS

### TASK API-001: Centralized API Key & Integration Configuration Hub
- **OBJECTIVE**: Allow SuperAdmin (`http://localhost:8000/superadmin/projects/{id}/config`) to centrally view, configure, and save third-party API keys (OpenAI / AI Provider, Telegram Bot, Payment Gateways, Shipping Providers, Webhooks) for any child project.
- **CURRENT STATE**: `superadmin.projects.config` only displays the project's internal `api_token` and checkboxes for core modules/feature packs. It has no fields to input or manage external API keys.
- **REFERENCE**: `public_html/app/Http/Controllers/Admin/SettingController.php` (Payment & Tracking groups) & `public_html/config/services.php`.
- **REQUIRED CHANGE**:
  1. Add an "API & Third-Party Integrations" tab in `resources/views/superadmin/projects/config.blade.php`.
  2. Provide structured inputs for:
     - AI Provider: `OPENAI_API_KEY`, `GEMINI_API_KEY`, default model.
     - Telegram Notifications: `TELEGRAM_BOT_TOKEN`, `TELEGRAM_CHAT_ID`.
     - Payment Gateways: `VIETQR_BANK_ID`, `VIETQR_ACCOUNT_NO`, `MOMO_PARTNER_CODE`, `MOMO_ACCESS_KEY`, `MOMO_SECRET_KEY`.
     - Shipping Providers: `GHN_TOKEN`, `GHN_SHOP_ID`, `GHTK_TOKEN`.
     - Webhook URL: External dispatch callback.
  3. Store settings securely in `project_settings` table keyed by `api.{service}.{field}`.
- **FILES**:
  - `app/Http/Controllers/SuperAdmin/ProjectController.php`
  - `resources/views/superadmin/projects/config.blade.php`
- **DATABASE IMPACT**: Non-destructive insert/update into `project_settings` table.
- **TENANT IMPACT**: Isolated strictly to the target `project_id`.
- **ADMIN IMPACT**: SuperAdmin can manage API keys for all scattered sources from one unified screen.
- **FRONTEND IMPACT**: None.
- **DEPENDENCIES**: None.
- **RISK**: Low.
- **TEST**: Feature test verifying that SuperAdmin saves and retrieves project-specific API keys without cross-project bleed.
- **ACCEPTANCE CRITERIA**: Saving API keys for Project 10 updates only Project 10 settings.

---

### TASK API-002: Remote / Local Child Project API Configuration Sync Handshake
- **OBJECTIVE**: Enable SuperAdmin to push configured API keys to external child projects (like `@public_html` or remote URLs) via the Bridge API.
- **CURRENT STATE**: `RemoteProjectService` supports `update_config`, but `ProjectBridgeController@updateConfig` only handles flat settings without encryption or structured integration mapping.
- **REFERENCE**: `app/Services/RemoteProjectService.php` & `app/Http/Controllers/Api/ProjectBridgeController.php`.
- **REQUIRED CHANGE**:
  1. Extend `ProjectBridgeController@updateConfig` to accept an `api_integrations` payload.
  2. If child project is running remotely, SuperAdmin sends POST to `{remote_url}/api/bridge` with `X-Bridge-Token: {api_token}`.
  3. Child project updates its local configuration store.
- **FILES**:
  - `app/Services/RemoteProjectService.php`
  - `app/Http/Controllers/Api/ProjectBridgeController.php`
- **DATABASE IMPACT**: Updates `settings` or `project_settings`.
- **TENANT IMPACT**: Scoped to project code.
- **ADMIN IMPACT**: One-click "Sync API Configs to Child Source" button.
- **FRONTEND IMPACT**: None.
- **DEPENDENCIES**: Task API-001.
- **RISK**: Low.
- **TEST**: Unit test verifying `X-Bridge-Token` validation and payload persistence.
- **ACCEPTANCE CRITERIA**: Bridge call with valid token updates configuration; invalid token returns HTTP 401.

---

### TASK DASH-001: CMS Dashboard Rebuild from `@public_html`
- **OBJECTIVE**: Modernize the CMS Dashboard (`/{projectCode}/admin`) to adopt the high-density layout from `@public_html` with real tenant-scoped metrics.
- **CURRENT STATE**: `Admin\DashboardController@projectDashboard` returns hardcoded zeros and empty collections.
- **REFERENCE**: `public_html/resources/views/admin/dashboard.blade.php`.
- **REQUIRED CHANGE**:
  1. Calculate real multi-tenant metrics in `Admin\DashboardController@projectDashboard`:
     - Order Pipeline: Unassigned, Pending, Processing, Shipping, Completed Today.
     - Revenue KPIs: Total revenue, monthly revenue, today's revenue.
     - Top Selling Products: 5 highest grossing products with thumbnails.
     - Slow Selling Products: Inactive inventory alert.
  2. Update `resources/views/cms/dashboard/index.blade.php` with the 5-card Pipeline Hub, Chart.js revenue graph, and product performance tables.
- **FILES**:
  - `app/Http/Controllers/Admin/DashboardController.php`
  - `resources/views/cms/dashboard/index.blade.php`
- **DATABASE IMPACT**: Read-only queries against existing `orders`, `order_items`, and `products_enhanced`.
- **TENANT IMPACT**: All queries strictly constrained by `project_id` and `tenant_id`.
- **ADMIN IMPACT**: Rich, actionable operational dashboard.
- **FRONTEND IMPACT**: None.
- **DEPENDENCIES**: None.
- **RISK**: Low.
- **TEST**: Feature test verifying that Site A dashboard displays Site A orders only.
- **ACCEPTANCE CRITERIA**: Dashboard renders with HTTP 200, shows accurate order counts, and zero cross-tenant leakage.

---

### TASK CRM-001: Agent & Distributor Operations Management Panel
- **OBJECTIVE**: Add CMS management for Sales Agents and Distributors.
- **CURRENT STATE**: `agents` table exists in DB, but has no controller or views in `/{projectCode}/admin`.
- **REFERENCE**: `public_html/app/Http/Controllers/Admin/AgentController.php` and `public_html/resources/views/admin/agents/`.
- **REQUIRED CHANGE**:
  1. Create `App\Http\Controllers\Admin\AgentController.php`.
  2. Implement CRUD views in `resources/views/cms/agents/`.
  3. Support assignment of unassigned orders to agents.
- **FILES**:
  - `app/Http/Controllers/Admin/AgentController.php`
  - `resources/views/cms/agents/index.blade.php`, `create.blade.php`, `edit.blade.php`
  - `routes/project.php`
- **DATABASE IMPACT**: Uses existing `agents` table.
- **TENANT IMPACT**: Scoped by `project_id`.
- **ADMIN IMPACT**: Store admin can manage distributor network.
- **DEPENDENCIES**: DASH-001.
- **RISK**: Low.
- **TEST**: Feature test for Agent CRUD and tenant boundary.
- **ACCEPTANCE CRITERIA**: Tenant A cannot view Tenant B agents.

---

### TASK CRM-002: Coupon & Flash Sale Promotion Management
- **OBJECTIVE**: Provide Admin CMS controls for promotional coupons and time-limited flash sales.
- **CURRENT STATE**: Models and DB tables exist (`coupons`, `flash_sale_campaigns`), but CMS routes/views are missing.
- **REFERENCE**: `public_html/resources/views/admin/coupons/` & `flash-sales/`.
- **REQUIRED CHANGE**:
  1. Create `CouponController` & `FlashSaleController` under `App\Http\Controllers\Admin`.
  2. Create views in `resources/views/cms/coupons/` and `resources/views/cms/flash-sales/`.
- **FILES**:
  - `app/Http/Controllers/Admin/CouponController.php`
  - `app/Http/Controllers/Admin/FlashSaleController.php`
  - `routes/project.php`
- **DATABASE IMPACT**: Uses existing `coupons` and `flash_sale_*` tables.
- **TENANT IMPACT**: Scoped by `project_id`.
- **ADMIN IMPACT**: Store admin can create discount codes and flash sales.
- **DEPENDENCIES**: None.
- **RISK**: Low.
- **TEST**: Feature test for coupon creation and tenant isolation.
- **ACCEPTANCE CRITERIA**: Discount codes apply correctly in cart for the authorized tenant only.
