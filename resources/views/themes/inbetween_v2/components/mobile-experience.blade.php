@php
  // 1. Resolve Project and Tenant context exactly like PC WidgetRenderingService
  $project = function_exists('current_project') ? current_project() : null;
  if (! $project && app()->bound('current_project_id')) {
      $project = \App\Models\Project::find(app('current_project_id'));
  }
  if (! $project && session('current_project_id')) {
      $project = \App\Models\Project::find(session('current_project_id'));
  }
  if (! $project) {
      $sessionProj = session('current_project');
      if ($sessionProj instanceof \App\Models\Project) {
          $project = $sessionProj;
      } elseif (is_array($sessionProj) && ! empty($sessionProj['id'])) {
          $project = \App\Models\Project::find($sessionProj['id']);
      } elseif (is_string($sessionProj)) {
          $project = \App\Models\Project::where('code', $sessionProj)->first();
      }
  }
  if (! $project && request()->route('projectCode')) {
      $project = \App\Models\Project::where('code', request()->route('projectCode'))->first();
  }
  if (! $project && request()->attributes->get('project')) {
      $project = request()->attributes->get('project');
  }
  if (! $project) {
      $project = \App\Models\Project::whereIn('code', ['DA005', 'inbetween_v2', 'inbetween'])->first() ?: \App\Models\Project::first();
  }

  $projectId = $project?->id;
  $tenantId = $project?->tenant_id ?? session('current_tenant_id');

  // 2. Query widgets matching PC areas (homepage-main or inbetween_v2)
  $query = \App\Models\Widget::withoutGlobalScopes()
      ->where('is_active', true)
      ->whereIn('area', ['homepage-main', 'inbetween_v2'])
      ->orderBy('sort_order');

  if ($tenantId || $projectId) {
      $query->where(function ($q) use ($tenantId, $projectId) {
          if ($tenantId) {
              $q->where('tenant_id', $tenantId);
          }
          if ($projectId) {
              $q->orWhere('project_id', $projectId);
          }
      });
  } else {
      $query->whereNull('project_id');
  }

  $widgetsList = $query->get();
  if ($widgetsList->isEmpty()) {
      $widgetsList = \App\Models\Widget::withoutGlobalScopes()
          ->where('is_active', true)
          ->whereIn('area', ['homepage-main', 'inbetween_v2'])
          ->orderBy('sort_order')
          ->get();
  }
  $mobileWidgets = $widgetsList->keyBy('type');

  // 3. Resolve merged settings via Widget classes (incorporating all defaults & database overrides)
  $resolveSettings = function (string $type, string $widgetClass) use ($mobileWidgets, $projectId, $tenantId): array {
      $rawSettings = $mobileWidgets[$type]->settings ?? [];
      if (!isset($rawSettings['id']) && isset($mobileWidgets[$type])) {
          $rawSettings['id'] = $mobileWidgets[$type]->id;
      }
      if ($projectId && !isset($rawSettings['project_id'])) {
          $rawSettings['project_id'] = $projectId;
      }
      if ($tenantId && !isset($rawSettings['tenant_id'])) {
          $rawSettings['tenant_id'] = $tenantId;
      }
      if (class_exists($widgetClass)) {
          $instance = new $widgetClass($rawSettings);
          if (method_exists($instance, 'getMergedSettings')) {
              return $instance->getMergedSettings();
          }
      }
      return $rawSettings;
  };

  $introSettings = $resolveSettings('inbetween_v2_intro', \App\Widgets\InbetweenV2\InbetweenV2IntroWidget::class);
  $heroSettings = $resolveSettings('inbetween_v2_hero', \App\Widgets\InbetweenV2\InbetweenV2HeroWidget::class);
  $whatWeDoSettings = $resolveSettings('inbetween_v2_what_we_do', \App\Widgets\InbetweenV2\InbetweenV2WhatWeDoWidget::class);
  $focusSettings = $resolveSettings('inbetween_v2_where_we_focus', \App\Widgets\InbetweenV2\InbetweenV2WhereWeFocusWidget::class);
  $founderSettings = $resolveSettings('inbetween_v2_founder', \App\Widgets\InbetweenV2\InbetweenV2FounderWidget::class);
  $clientsSettings = $resolveSettings('inbetween_v2_our_clients', \App\Widgets\InbetweenV2\InbetweenV2OurClientsWidget::class);
  $businessSettings = $resolveSettings('inbetween_v2_business', \App\Widgets\InbetweenV2\InbetweenV2BusinessWidget::class);
  $footerSettings = $resolveSettings('inbetween_v2_footer', \App\Widgets\InbetweenV2\InbetweenV2FooterWidget::class);
@endphp

<!-- Mobile Dedicated Experience (Rendered for < 1024px) -->
<div class="inbetween-mobile-wrapper w-full min-h-screen bg-[#131313] text-white flex flex-col" id="mobile-experience-root" style="overflow-x: clip;">
  {{-- 1. Mobile Sticky Navigation Header (reveals on scroll past hero) --}}
  @include('themes.inbetween_v2.components.mobile.header', ['settings' => array_merge($introSettings, $heroSettings)])

  {{-- 2. Onepage Intro Section (Entering Vietnam? -> We Can Help!) --}}
  @include('themes.inbetween_v2.components.mobile.intro', ['settings' => $introSettings])

  {{-- 3. Hero Section (Card layout matching HERO.svg) --}}
  @include('themes.inbetween_v2.components.mobile.hero', ['settings' => $heroSettings])

  {{-- 4. What We Do --}}
  @include('themes.inbetween_v2.components.mobile.what-we-do', ['settings' => $whatWeDoSettings])

  {{-- 5. Where We Focus --}}
  @include('themes.inbetween_v2.components.mobile.where-we-focus', ['settings' => $focusSettings])

  {{-- 6. The Founder --}}
  @include('themes.inbetween_v2.components.mobile.founder', ['settings' => $founderSettings])

  {{-- 7. Our Clients (client.svg) --}}
  @include('themes.inbetween_v2.components.mobile.clients', ['settings' => $clientsSettings])

  {{-- 8. Beyond Business --}}
  @include('themes.inbetween_v2.components.mobile.business', ['settings' => $businessSettings])

  {{-- 9. Footer Section (includes Contact Form & Footer matching footer4.svg 100%) --}}
  @include('themes.inbetween_v2.components.mobile.footer', ['settings' => $footerSettings])
</div>
