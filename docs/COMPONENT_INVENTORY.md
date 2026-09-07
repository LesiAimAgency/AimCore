# COMPONENT INVENTORY

**Reference**: `@public_html` vs `Current Laravel Core` (`c:\MAMP\htdocs\core\VGTDemo`)  
**Date**: 2026-09-07  
**Status**: AUDITED  

---

## 1. UI COMPONENT MATRIX

| Component | Public HTML (`@public_html`) | Current Admin (`resources/views/cms/`) | Storefront Frontend | Parity Status | Recommendation |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **Sidebar Navigation** | Collapsible dark/light sidebar with grouped icons, badges & active states | Fixed dark/white sidebar with project switcher and route highlights | N/A (Storefront uses Megamenu/Mobile drawer) | **PARITY (GOOD)** | Keep current sidebar structure; add dynamic badges for unassigned orders |
| **Header / Topbar** | Breadcrumbs, live project URL link, notifications dropdown, user profile | Project code indicator, view site link, user dropdown | Header with topbar contact, search & mini-cart | **PARITY (GOOD)** | Add notification bell audio chime from public_html |
| **Statistics Cards** | High-contrast KPI cards with micro-hover lift, icons, trend percentages | Basic colored cards with gradients | N/A | **UPGRADE NEEDED** | Adopt `@public_html` card styling with border accent and trend pill |
| **Data Tables** | Borderless clean rows, action button groups (`act-btn edit/delete`), status pills | Standard Tailwind table with hover row effect | N/A | **PARITY (GOOD)** | Reuse existing `table` partials; enforce responsive wrapper |
| **Form Inputs & Groups** | Rounded-lg inputs, floating labels, validation error alerts | Tailwind form inputs with label and error messages | Storefront styled inputs | **PARITY (GOOD)** | Sibling patterns match |
| **Modals** | Vanilla JS overlay with slide-in animation & ESC listener | Modal overlays for admin reset, dynamic forms | Quick view modals (WK & VTM) | **PARITY (GOOD)** | Reuse existing modal patterns |
| **Toast & Notifications** | `showNotification(msg, type)` toast fixed top-right with auto-dismiss (5s) | Session alerts (`session('alert')`, `session('success')`) | Alpine.js toast | **PARITY (GOOD)** | Unify on toast component |
| **Tabs** | Alpine.js / Vanilla JS button tabs (`tab-content`, `tab-button`) | Multi-tab settings and project config tabs | Storefront specification tabs | **PARITY (GOOD)** | Retain existing tab implementations |
| **Dropdowns** | Native select & custom nice-select wrapper | Native select & Flux UI dropdowns | Nice-select / custom dropdowns | **PARITY (GOOD)** | Standardize on vanilla/nice-select |
| **Pagination** | Laravel Tailwind pagination links (`links()`) | Standard Laravel pagination | Storefront pagination | **PARITY (MATCH)** | Existing pagination is fully functional |
| **Charts** | Chart.js 4.x responsive line & bar charts | Chart.js canvas elements present | N/A | **UPGRADE NEEDED** | Connect real data arrays from controller |
| **Image & Media Uploader** | Custom AJAX media modal with preview, multi-select, folder navigation | Complete Media Library (`cms.media.index`, AJAX picker) | N/A | **PARITY (SUPERIOR IN CORE)** | Core already has full Media Library |
| **Rich Text Editor** | TinyMCE / Summernote CDN | Summernote / TinyMCE editor integrated | N/A | **PARITY (MATCH)** | Preserved |
| **Status Badges** | Rounded-full pills with dot indicator (green, yellow, red, blue, purple) | Rounded-full Tailwind badges | Product badges (HOT, SALE, NEW) | **PARITY (MATCH)** | Matching color maps |
