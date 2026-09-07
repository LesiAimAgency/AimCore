# DISCOVERED ISSUES LOG

**Reference Rule**: CODEX MASTER CONTROL (Sections 28 & 42)  
**Date**: 2026-09-07  
**Status**: ACTIVE LOG (DO NOT FIX ARBITRARILY - AUDIT FIRST)  

---

## 1. LOGGED ISSUES

### ISSUE-001: CMS Dashboard Hardcoded Zero Statistics
- **Location**: `app/Http/Controllers/Admin/DashboardController.php` (`projectDashboard` method).
- **Discovery**: The controller passes hardcoded zeros (`today_orders => 0`, `today_revenue => 0`, `pending_orders => 0`) and empty collections (`revenue_chart => collect()`, `top_products => collect()`).
- **Impact**: Tenant admins opening `/{projectCode}/admin` see an inactive/dead dashboard despite having real products and orders in the database.
- **Remediation**: Wire real tenant-scoped Eloquent aggregates into `DashboardController`.

### ISSUE-002: Lack of Centralized API Key Management in SuperAdmin
- **Location**: `http://localhost:8000/superadmin/projects/10/config` (`ProjectController@config`, `config.blade.php`).
- **Discovery**: SuperAdmin displays `$project->api_token` for bridge control, but does not offer an editable management interface for third-party API Keys (e.g. OpenAI / AI Provider, Telegram Bot, Payment Gateways like VietQR/Momo/VNPay, Shipping APIs like GHN/GHTK, or Webhook Endpoints).
- **Impact**: Agency administrators have to manually edit child `.env` files or database rows across scattered project sources instead of managing them centrally from SuperAdmin.
- **Remediation**: Introduce a dedicated "API & Integrations Configuration" panel inside `superadmin.projects.config` and extend `RemoteProjectService` / `ProjectSetting` to push these keys securely.

### ISSUE-003: Public_html Environment & Standalone Nature
- **Location**: `c:\MAMP\htdocs\core\VGTDemo\public_html\.env`
- **Discovery**: `public_html` is a complete standalone Laravel project pointing to a separate database (`viettinmartdemo_demo1`) and remote domain (`viettinmart.vnglobaltech.com`).
- **Impact**: It must be treated as a reference architectural standard (UI, module definitions, workflows) and an external remote candidate rather than a sub-folder to blindly execute in-place migrations.

### ISSUE-004: Missing CMS Agents & Coupons CRUD UI
- **Location**: `resources/views/cms/`
- **Discovery**: Database tables `agents`, `coupons`, `flash_sale_campaigns`, `flash_sale_items` already exist from migration `2026_09_04_000001_create_legacy_vtm_tables.php`, but routes and views are missing from the `/{projectCode}/admin` CMS.
- **Impact**: Storefront features depending on coupons or flash sales cannot be configured by store admins.
