# OUT OF SCOPE DISCOVERIES

**Platform**: Laravel 12 Multisite Core  
**Date**: 2026-09-07  
**Policy**: SCOPE LOCK ENFORCED. No unauthorized implementation. All new discoveries recorded here.

---

## DISCOVERY 1: Agency Internal Management System (SuperAdmin HR & Contracts)

- **Feature**: Employee management, contract tracking, department stages, briefs, timesheets, and tickets under `/superadmin/*`.
- **Why discovered**: Present in `routes/superadmin.php`, `app/Http/Controllers/SuperAdmin/*`, and database migrations (`contracts`, `tasks`, `briefs`, `employees`).
- **Why not currently implemented/modified**: The current project objective is strictly focused on **Multisite Ecommerce & Storefront Parity** between Site A (`viettinmart-eco`) and Site B (`wkcomputer`). SuperAdmin internal agency tools are operational and separate.
- **Potential impact**: None on tenant ecommerce. Modifying agency core could introduce side effects to internal operational dashboards.
- **Recommendation**: Keep strictly isolated; do not modify or refactor in current ecommerce scope.

---

## DISCOVERY 2: Legacy Single-Tenant Unit/Feature Tests

- **Feature**: Outdated test suites like `tests/Feature/CategoryHierarchyTest.php`, `ProductAttributeSystemTest.php`, and `UserManagementTest.php`.
- **Why discovered**: Running `php artisan test --compact` executed legacy test files that assumed single-tenant MySQL tables without `project_id` scoping or SQLite foreign key differences.
- **Why not currently implemented/modified**: The dedicated multisite test suites (`MultisiteTenantIsolationTest.php`, `AdminCmsParityTest.php`, `MultisiteIsolationTest.php`, `WkcomputerIsolationTest.php`) provide 100% clean verification (22 passed, 50 assertions).
- **Potential impact**: Running `artisan test` without arguments causes noise due to legacy assertions expecting legacy schema states.
- **Recommendation**: Create a dedicated test runner command or filter in `composer.json` specifically running multisite tests (`php artisan test --compact tests/Feature/*Tenant*.php tests/Feature/*Parity*.php tests/Feature/*Isolation*.php`). Do not delete legacy test files without approval.

---

## DISCOVERY 3: Live Payment Gateway (VietQR / VNPAY / Momo / Kredivo API Webhook)

- **Feature**: Live banking payment gateway callback and instant transaction reconciliation.
- **Why discovered**: `CheckoutController` has mock logic and Kredivo calculation endpoint (`/payment/kredivo/calculate`), while Admin Settings has a Payment configuration tab (`settings.payment`).
- **Why not currently implemented**: Requires official merchant API keys, webhook secret keys, and live IPN endpoints from payment providers.
- **Potential impact**: Orders currently default to COD (Cash on Delivery) or Bank Transfer instructions without live webhook callbacks.
- **Recommendation**: Standardize Payment Settings to display merchant bank account info and QR code dynamically via `setting('bank_name')`, `setting('bank_account')`, `setting('bank_owner')` until merchant production keys are provisioned.
