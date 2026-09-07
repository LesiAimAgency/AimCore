# SYSTEM ARCHITECTURE MAP

**Platform**: Laravel 12 Multisite Core + Admin CMS  
**Date**: 2026-09-07  
**Scope**: Viettinmart (`viettinmart-eco`), WKComputer (`wkcomputer`), `@public_html` & Central SuperAdmin Hub

---

## 1. FRONTEND ARCHITECTURE FLOW

```
User Request (Browser)
       │
       ▼
HTTP Server (Apache / MAMP / PHP CLI Server)
       │
       ▼
Routing Layer:
  ├── routes/web.php (Root redirects, Media watermarking, SEO sitemaps)
  ├── routes/project.php (Prefix: /{projectCode} or dedicated prefix: /wkcomputer)
  └── routes/wkcomputer.php & routes/viettinmart.php
       │
       ▼
Middleware Pipeline:
  ├── ProjectSubdomainMiddleware / WkcomputerMiddleware
  │     ├── Detects project code from URL prefix or route parameter
  │     ├── Loads Project model (Project::where('code', $code)->first())
  │     └── Injects $project into request attributes and view sharing
  └── SetProjectDatabase
        ├── Sets session(['current_project_id' => $project->id])
        ├── Sets session(['current_tenant_id' => $tenantId])
        └── Configures connection / query contexts
       │
       ▼
Controller Layer:
  ├── Site A: App\Http\Controllers\Viettinmart\* (HomeController, ShopController, CartController, CheckoutController)
  └── Site B: App\Http\Controllers\Wkcomputer\* (HomeController, ShopController, BuildPcController, CartController, CheckoutController)
       │
       ▼
Service Layer:
  ├── SettingsService (Caches and resolves setting('key') from project_settings)
  ├── WidgetRegistry (Renders widget areas, e.g., homepage-main, header, footer)
  └── LayoutHelper / ViettinmartHelper (Theme view helpers)
       │
       ▼
Model Layer (Eloquent with Scoping):
  ├── App\Models\Product / WkProduct (products_enhanced)
  ├── App\Models\Post / WkPost (posts)
  ├── App\Models\ProductCategory / WkCategory (product_categories / taxonomies)
  ├── App\Models\Widget (widgets)
  └── App\Models\Order, FormSubmission, Review
       │
       ▼
Database Layer:
  └── Shared MySQL Database / SQLite (Filtered strictly by project_id and tenant_id)
       │
       ▼
View Rendering (Blade Templates):
  ├── Site A: resources/views/frontend/themes/viettinmartdemo/
  └── Site B: resources/views/frontend/themes/wkcomputerdemo/
       │
       ▼
Client Browser Response (HTML5, Vanilla CSS, JS Assets from public/themes/*)
```

---

## 2. ADMIN CMS ARCHITECTURE FLOW

```
Admin User Request (Browser)
       │
       ▼
URL: /{projectCode}/admin/*
       │
       ▼
Route Definition: routes/project.php
  └── Route::prefix('{projectCode}/admin')->name('project.admin.')->middleware([...])
       │
       ▼
Security & Middleware Pipeline:
  ├── ProjectSubdomainMiddleware (Resolves project from {projectCode})
  ├── SetProjectDatabase (Configures tenant session & query scopes)
  └── CheckCmsRole
        ├── Checks session('project_user_id')
        ├── Verifies ProjectUser authentication
        ├── Verifies non-superadmin belongs to target project_id:
        │     in_array($project->id, $user->project_ids)
        └── Aborts HTTP 403 Forbidden if tenant mismatch
       │
       ▼
Admin Controller Layer (app/Http/Controllers/Admin/*):
  ├── DashboardController (Project-specific KPIs, sales, order counts)
  ├── ProductController (Catalog CRUD, images, attributes, variants)
  ├── CategoryController (Nested category tree, slug management)
  ├── BrandController & AttributeController
  ├── OrderController (Order lifecycle, invoice printing, customer notes)
  ├── FormSubmissionController (Contact inquiries, review status, deletion)
  ├── ReviewController (Customer feedback, ratings, approval moderation)
  ├── MenuController (Header/footer navigation tree)
  ├── MediaController (Media library, asset folder management)
  ├── WidgetController (Page builder widgets, order, repeatable configs)
  └── SettingsController (21 modular configuration tabs)
       │
       ▼
Service Layer:
  ├── SettingsService::getInstance()->saveProjectSettings($projectId, $data)
  ├── WidgetPermissionService & WidgetRegistry (Dependency & template validation)
  └── WkcomputerDeployService (Automated catalog synchronizer & seeder)
       │
       ▼
Model Layer:
  └── Models implementing BelongsToTenant & ProjectScoped global scopes
       │
       ▼
Database Storage:
  └── Tables: products_enhanced, posts, taxonomies, widgets, menus, settings, orders
       │
       ▼
CMS Blade Views (resources/views/cms/*):
  └── Shared administration templates with dynamic project scope
```

---

## 3. MULTISITE TENANT ARCHITECTURE FLOW

```
Incoming Request
       │
       ▼
1. Tenant Resolution:
   ├── Domain/Subdomain Inspection (or URL prefix: /viettinmart-eco vs /wkcomputer)
   └── Project lookup in `projects` table:
         ├── Site A -> Project ID: 10, Tenant ID: 3, Code: 'viettinmart-eco'
         └── Site B -> Project ID: 14, Tenant ID: 4, Code: 'wkcomputer'
       │
       ▼
2. Tenant Context Binding:
   ├── Request attributes: $request->attributes->set('project', $project)
   ├── Session context: session(['current_project_id' => 10/14, 'current_tenant_id' => 3/4])
   ├── Service container: app()->instance('current_project_id', $project->id)
   └── Theme view path prepending (WkcomputerMiddleware prepends wkcomputerdemo theme)
       │
       ▼
3. Eloquent Global Query Scoping:
   ├── Models using BelongsToTenant / ProjectScoped traits:
   │     builder->where('project_id', $currentProjectId)
   │     builder->where('tenant_id', $currentTenantId)
   └── Zero Data Leakage:
         ├── Query for Site A products NEVER retrieves Site B products
         ├── Query for Site B widgets NEVER retrieves Site A widgets
         └── Direct resource lookups across tenants yield ModelNotFoundException (HTTP 404)
       │
       ▼
4. Administrative Authorization:
   ├── User authenticates via /{projectCode}/login
   ├── Stored in ProjectUser / User with project_ids: [10] or [14]
   └── CheckCmsRole validates user's permitted project IDs against target project:
         ├── User (project_ids: [10]) accessing /wkcomputer/admin -> HTTP 403 Forbidden
         └── User (project_ids: [14]) accessing /viettinmart-eco/admin -> HTTP 403 Forbidden
```

---

## 4. SUPERADMIN HUB & CHILD SOURCE API INTEGRATION FLOW

```
SuperAdmin Control Panel (http://localhost:8000/superadmin/projects/{id}/config)
       │
       ├───────────────────────────────────────────────────────┐
       │                                                       │
[Local Managed Mode (DB Shared)]              [Remote Child Mode (External Source)]
       │                                                       │
  Directly updates:                                            ▼
  - `project_settings`                          RemoteProjectService::callRemote(...)
  - `settings` table (scoped)                     Headers: ['X-Bridge-Token' => $api_token]
  - `projects.cms_features` (JSON)                Target: {remote_url}/api/bridge
  - 1-Click Deploy Seeders                                     │
                                                               ▼
                                                Child Project Bridge Receiver:
                                                App\Http\Controllers\Api\ProjectBridgeController
                                                  ├── validateToken(hash_equals(api_token, token))
                                                  ├── actions:
                                                  │     ├── 'get_config'
                                                  │     ├── 'update_config'
                                                  │     ├── 'sync_data'
                                                  │     └── 'get_stats'
                                                  └── Updates child local DB / .env settings
```

---

## 5. PAGE BUILDER ENGINE (PROTECTED MODULE)

```
Routes (routes/web.php):
  ├── GET  /admin/page-builder
  ├── GET  /admin/page-builder/pages/{page}/edit
  ├── POST /admin/page-builder/pages/{page}/sections
  ├── PUT  /admin/page-builder/sections/{section}
  └── POST /admin/page-builder/sections/reorder
       │
       ▼
Controller: App\Http\Controllers\Admin\PageBuilderController
       │
       ▼
Views: resources/views/admin/page-builder/*
       │
       ▼
Status: PROTECTED - NO MODIFICATIONS TO CORE ENGINE PERMITTED
```
