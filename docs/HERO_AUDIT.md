# HERO IMPLEMENTATION AUDIT

**Platform**: Laravel 12 Multisite Core  
**Date**: 2026-09-07  
**Audit Purpose**: Trace Hero component architecture from Admin down to JS for both tenant sites.

---

## 1. SITE A: VIETTINMART (`viettinmart-eco`)

### Architectural Trace:
```
Admin CMS:
  URL: /viettinmart-eco/admin/widgets
  Controller: App\Http\Controllers\Admin\WidgetController
  Class: App\Widgets\Viettinmart\ViettinmartHeroSliderWidget
       │
       ▼
Database:
  Table: `widgets`
  Fields:
    - id: 1
    - project_id: 10
    - tenant_id: 3
    - title: "Viettinmart Hero Slider"
    - type: "viettinmart_hero_slider"
    - area: "homepage-main"
    - order: 1
    - is_active: 1
    - settings (JSON): Contains repeatable slides array:
        [
          {
            "image": "theme/images/banner/banner-01.png",
            "pre_title": "Giảm đến 30% cho đơn hàng đầu tiên",
            "title": "Đừng bỏ lỡ những ưu đãi\nthực phẩm tuyệt vời",
            "btn_text": "Mua ngay",
            "btn_link": "/shop"
          }
        ]
       │
       ▼
Model:
  App\Models\Widget (Applies BelongsToTenant, ProjectScoped)
       │
       ▼
Controller & Service:
  App\Widgets\WidgetRegistry::renderArea('homepage-main')
  Helper: render_widgets('homepage-main')
       │
       ▼
Blade Template:
  resources/views/frontend/themes/viettinmartdemo/index.blade.php:
    {!! render_widgets('homepage-main') ?: render_widgets('homepage') !!}
  View: resources/views/widgets/inbetween/viettinmart_hero_slider.blade.php
       │
       ▼
HTML / CSS / JS:
  - HTML: Swiper container structure with dynamic slides loop (@foreach($slides as $slide)).
  - CSS: Styled via `public/theme/css/` (Swiper CSS bundled).
  - JS: Initialized with Swiper.js (`autoplay`, `loop`, `pagination`, `navigation`).
```

### Viettinmart Hero Properties:
- **Hero Data**: Fully Dynamic (loaded from `widgets.settings` JSON).
- **Hero Image**: Dynamic (selected via media manager / image path).
- **CTA**: Dynamic (`btn_text`, `btn_link`).
- **Responsive**: Fully responsive with mobile breakpoint adjustments.
- **Animation / Slider**: Swiper.js carousel with autoplay delay control.
- **Tenant Scoping**: Isolated by `project_id = 10` and `tenant_id = 3`.
- **Admin Configuration**: Fully editable via Admin Widget Editor.

---

## 2. SITE B: WKCOMPUTER (`wkcomputer`)

### Architectural Trace:
```
Admin CMS:
  URL: /wkcomputer/admin/widgets
  Status: Widget CRUD exists in Admin, BUT the WKComputer storefront template
          does NOT call `render_widgets('homepage-main')`.
       │
       ▼
Database:
  Status: BYPASSED by storefront view.
       │
       ▼
Model:
  Status: No Model invoked for Hero on WK homepage.
       │
       ▼
Controller & Service:
  App\Http\Controllers\Wkcomputer\HomeController::index()
  Fetches categories and products, but passes NO hero data to view.
       │
       ▼
Blade Template:
  resources/views/frontend/themes/wkcomputerdemo/index.blade.php (Lines 14 - 150):
  Renders static HTML structure directly!
       │
       ▼
HTML / CSS / JS:
  - HTML: 3-column layout:
      1. Left: 14 hardcoded categories with FontAwesome icons.
      2. Center: Gradient banner "Hi 2K8! SHOW ĐIỂM GIẢM SÂU", static vouchers, static date "01.07.2026".
      3. Right: 2 gradient cards ("ƯU ĐÃI HỌC SINH - SINH VIÊN", "KHUYẾN MÃI THÁNG NÀY").
      4. Bottom: 4 small promo boxes ("BUILD PC", "LAPTOP GAMING RTX 4050", etc.).
  - CSS: Embedded `<style>` tag inside `index.blade.php` (`.wk-hero-dark-override`, etc.).
  - JS: Static navigation buttons without dynamic sliding script attached.
```

### WKComputer Hero Properties:
- **Hero Data**: HARDCODED (Static HTML in Blade template).
- **Hero Image**: Inline CSS linear gradients with FontAwesome icons (no DB images).
- **CTA**: Static buttons / text.
- **Responsive**: Grid and Flexbox responsive rules via media queries (`@media (max-width: 1200px)`, `991px`, `767px`).
- **Animation / Slider**: Static markup with navigation arrows, but inactive carousel JS.
- **Tenant Scoping**: Physical template isolation in `resources/views/frontend/themes/wkcomputerdemo/`, but not database-driven.
- **Admin Configuration**: NOT editable from Admin CMS. Any title or promo change currently requires editing Blade template.

---

## 3. HERO PARITY GAP & AUDIT FINDINGS

1. **Gap Identified**:
   - Viettinmart Hero is **100% CMS dynamic**, managed through `ViettinmartHeroSliderWidget` in the `widgets` table.
   - WKComputer Hero is **100% hardcoded in Blade**, bypassing the database and Admin CMS widget engine.
2. **Business Test Simulation**:
   - **Test**: Admin changes Hero Title in WK Admin -> Click Save -> Reload WK Storefront.
   - **Result**: Storefront still displays "Hi 2K8! SHOW ĐIỂM GIẢM SÂU". **FAIL** (Expected: Storefront displays updated title).
3. **Recommendation**:
   - Create a dedicated WKComputer Hero widget (or support dynamic override via `WidgetRegistry` / `SettingsService`) so that changing Hero title, banners, and vouchers in Admin CMS updates the storefront in real time without breaking the custom dark cyberpunk UI.
