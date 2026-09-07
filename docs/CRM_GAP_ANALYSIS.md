# CRM GAP ANALYSIS

**Comparison**: Reference `@public_html` CRM vs Current Laravel Core (`c:\MAMP\htdocs\core\VGTDemo`)  
**Date**: 2026-09-07  
**Status**: AUDITED  

---

## 1. CRM CAPABILITY MATRIX

| Feature | Public HTML Reference | Current Laravel Core | Database Table | Admin CMS Route / Controller | Status | Action Required |
| :--- | :--- | :--- | :--- | :--- | :--- | :--- |
| **Customer Directory** | Complete listing with total orders, total spent, order history, phone, address | Basic user listing | `users`, `customers`, `user_addresses` | `UserController` / `CustomerController` | **PARTIAL** | Upgrade CMS User/Customer view to show ecommerce lifetime value & address history |
| **Agent & Distributor CRM** | Full CRUD, Distributor/Retailer/Franchise types, commission rate, region grouping | Missing in CMS | `agents` (created in migration `2026_09_04_000001`) | No CMS AgentController | **MISSING** | Add `AgentController` into `App\Http\Controllers\Admin` & views in `resources/views/cms/agents` |
| **Form Submissions & Leads** | Overview dashboard, templates, modal forms, status tracking, anti-spam filters | Standard list, status edit, view details, note save | `form_submissions`, `form_templates`, `modal_forms` | `FormSubmissionController` | **PARTIAL** | Integrate template builder & modal form triggers from public_html into CMS |
| **Newsletter Subscriptions** | Dedicated subscribers table, export CSV, unsubscribe management | Basic subscriber list | `subscribers` / `posts` | `SubscriberController` | **PARTIAL** | Add quick export and bulk operations |
| **Spam Protection & Audit** | Spam dashboard, blocked IPs, spam score, keyword filter | Missing | `activity_logs`, `visitor_logs` | `SpamDashboardController` (public_html only) | **MISSING** | Port spam prevention and blocked IP controls |
| **Customer Reviews Moderation** | Star rating, product association, approval toggle, reply | Approved/Pending toggle, rating display | `reviews` | `ReviewController` | **WORKING** | Verified working in multisite isolation tests |
| **Coupons & Voucher Engine** | Fixed/Percentage discounts, min order, expiry date, usage limit counter | Tables exist in DB | `coupons` | Missing CMS CRUD | **MISSING** | Implement CMS `CouponController` & views |
| **Flash Sale Engine** | Campaign dates, item quotas, countdown timer, banner widgets | Tables exist in DB | `flash_sale_campaigns`, `flash_sale_items` | Missing CMS CRUD | **MISSING** | Implement CMS `FlashSaleController` & views |

---

## 2. WORKFLOW TRACING (END-TO-END)

### A. Lead / Form Submission Flow:
```text
Storefront Contact / Modal Form (Frontend)
   ↓ (POST request with CSRF & honeypot)
FormSubmissionController@submit (Sanitization & XSS check)
   ↓
Database Insert: form_submissions (project_id, tenant_id, form_name, data JSON)
   ↓
Admin Notification (Real-time badge counter)
   ↓
CMS Admin Form Detail (/{projectCode}/admin/form-submissions/{id})
   ↓
Admin Action: Status update (Pending -> Contacted -> Converted -> Spam) + Admin Note
```
*Current status in Core: WORKING (FormSubmissionController & Feature test passed).*

### B. Customer / Distributor Order Flow:
```text
Customer Order Placed (Cart -> Checkout -> Order Created)
   ↓
Database Insert: orders (project_id, tenant_id, status=pending, unassigned)
   ↓
Dashboard Order Pipeline alert ("Chưa gán đại lý")
   ↓
Admin Dispatches Order to Agent in region (orders.agent_id = agent.id)
   ↓
Agent Fulfills Order -> Status transitions to processing -> shipping -> completed
   ↓
Distributor Commission & Revenue credited in Dashboard Leaderboard
```
*Current status in Core: PARTIAL (Orders exist, but Agent assignment & Leaderboard UI not yet connected in CMS).*
