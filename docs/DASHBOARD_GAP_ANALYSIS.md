# DASHBOARD GAP ANALYSIS

**Single Source of Truth Comparison**: `@public_html` vs `Current Laravel Core` (`c:\MAMP\htdocs\core\VGTDemo`)  
**Date**: 2026-09-07  
**Status**: AUDITED  

---

## 1. EXECUTIVE SUMMARY

`public_html/resources/views/admin/dashboard.blade.php` represents a high-density, real-world e-commerce & agency operations dashboard. It combines an **Order Pipeline Hub**, **Real-Time Revenue Chart**, **Top Selling & Slow Selling Products**, **Distributor / Agent Ranking**, and an **Unassigned Dispatch Hub**.

In contrast, the current Laravel Core (`cms.dashboard.index` and `cms.dashboard`) was found to have dummy fallback values (`0` revenue, `0` orders, empty collections `collect()`), missing the order fulfillment pipeline, missing product ranking visuals, and lacking actionable agent metrics.

---

## 2. DETAILED DASHBOARD COMPONENT COMPARISON

| Component | `@public_html` Reference | Current Laravel Core (`VGTDemo`) | Data Source / Database Support | Status | Action Required |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **Order Pipeline Hub** | 5-stage visual progress: Unassigned, Pending, Processing, Shipping, Completed Today | Missing completely | `orders` table (`status` column: `pending`, `processing`, `shipped`, `completed`, `cancelled`) | **MISSING** | Port pipeline cards with real query aggregate scoped by tenant |
| **Revenue & Performance KPI Cards** | 5 Cards: Revenue 6M, Revenue 3M, Monthly Revenue, Total Orders, Total Customers | 4 Cards: Today Revenue, Today Orders, Total Users, Pending Orders (Hardcoded to 0) | `orders` (`total`, `created_at`), `customers` / `users` tables | **BROKEN / STUB** | Replace hardcoded 0 in `Admin\DashboardController` with real scoped queries |
| **Unassigned Orders Dispatch Hub** | Table of unassigned orders with quick dispatch action (`Gán ngay`) | Missing completely | `orders` (`agent_id` or `assigned_to`, `order_number`, `total`) | **MISSING** | Add dispatch widget for tenant admins |
| **Interactive Revenue Chart** | Chart.js monthly/weekly revenue line chart with gradient fill | Canvas element present but receives empty `collect()` from controller | `orders` grouped by date/month | **BROKEN** | Feed real monthly revenue array into Chart.js |
| **Top Selling Products** | Table with image, name, quantity sold, total revenue | Empty collection `collect()` | `order_items` join `products_enhanced` | **BROKEN** | Add aggregation query for top 5 products |
| **Slow Selling Products** | Alert list of products with 0/low sales with Flash Sale suggestion | Missing completely | `products_enhanced` left join `order_items` | **MISSING** | Add low selling query and alert panel |
| **Agent / Distributor Ranking** | Leaderboard with rank, agent name, completed orders, total revenue, % share | Missing completely | `agents` table with `orders` sum | **MISSING** | Integrate agent performance ranking |
| **Admin Quick Actions** | Add Product, Manage Orders, Settings, Users shortcuts | 4 simple link cards | Routes `project.admin.*` | **WORKING (BASIC)** | Upgrade UI styling to match standard reference |
| **Recent Activity & Real-time Orders** | Polling stream with audio chime (`new_order_sound.mp3`) and toast notifications | Only static VisitorLog IPs displayed | `orders` table + AJAX endpoint `/admin/orders/latest` | **PARTIAL** | Integrate audio & toast alert for new incoming orders |

---

## 3. DATA FLOW & CONTROLLER AUDIT

### Current Controller: `App\Http\Controllers\Admin\DashboardController@projectDashboard`
```php
// Currently returns hardcoded zeros:
'today_orders' => 0,
'today_revenue' => 0,
'total_revenue' => 0,
'out_of_stock_products' => 0,
'new_users_today' => User::whereDate('created_at', today())->count(),
'total_users' => User::count(),
'total_products' => 0,
'pending_orders' => 0,
'revenue_chart' => collect(),
'orders_chart' => collect(),
'order_status_chart' => collect(),
'top_products' => collect(),
'recent_orders' => collect(),
```

### Required Business Logic (Multi-Tenant Scoped):
```php
$projectId = $project->id;
$tenantId = $project->tenant_id ?? $project->id;

// Pipeline Counts:
$pendingOrders = Order::forProject($projectId)->where('status', 'pending')->count();
$processingOrders = Order::forProject($projectId)->where('status', 'processing')->count();
$shippingOrders = Order::forProject($projectId)->where('status', 'shipping')->count();
$completedToday = Order::forProject($projectId)->where('status', 'completed')->whereDate('updated_at', today())->count();

// Financials:
$todayRevenue = Order::forProject($projectId)->where('status', 'completed')->whereDate('created_at', today())->sum('total');
$monthlyRevenue = Order::forProject($projectId)->where('status', 'completed')->whereMonth('created_at', now()->month)->sum('total');

// Top Selling:
$topProducts = DB::table('order_items')
    ->join('orders', 'orders.id', '=', 'order_items.order_id')
    ->join('products_enhanced', 'products_enhanced.id', '=', 'order_items.product_id')
    ->where('orders.project_id', $projectId)
    ->where('orders.status', 'completed')
    ->select('products_enhanced.id', 'products_enhanced.name', 'products_enhanced.thumbnail_url', DB::raw('SUM(order_items.quantity) as total_sold'), DB::raw('SUM(order_items.subtotal) as total_revenue'))
    ->groupBy('products_enhanced.id', 'products_enhanced.name', 'products_enhanced.thumbnail_url')
    ->orderByDesc('total_sold')
    ->limit(5)
    ->get();
```

---

## 4. TENANT ISOLATION SAFETY
- Every single metric query MUST include `where('project_id', $projectId)` or `where('tenant_id', $tenantId)`.
- Never run global `Order::count()` or `User::count()` across tenants. Site A (`viettinmart-eco`) metrics must be 100% segregated from Site B (`wkcomputer`).
