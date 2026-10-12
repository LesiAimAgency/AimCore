@extends('themes.inbetween_v2.layouts.app')

@section('content')
{{-- Desktop / PC One-page Experience (>= 1024px) --}}
<main class="inbetween-scroll-container intro-locked w-full h-screen h-[100dvh] overflow-y-scroll overflow-x-hidden hidden lg:block" id="inbetween-app" aria-label="Desktop One-page Experience">
    @php
        $renderedHtml = '';
        try {
            if (function_exists('render_widget_area')) {
                $renderedHtml = render_widget_area('homepage-main') ?: render_widget_area('inbetween_v2');
            }
        } catch (\Throwable $e) {
            $renderedHtml = '';
        }
    @endphp

    @if(!empty(trim($renderedHtml)))
        {!! $renderedHtml !!}
    @else
        @php
            $desktopWidgets = [
                ['class' => \App\Widgets\InbetweenV2\InbetweenV2IntroWidget::class, 'view' => 'widgets.inbetween_v2.intro'],
                ['class' => \App\Widgets\InbetweenV2\InbetweenV2HeroWidget::class, 'view' => 'widgets.inbetween_v2.hero'],
                ['class' => \App\Widgets\InbetweenV2\InbetweenV2WhatWeDoWidget::class, 'view' => 'widgets.inbetween_v2.what_we_do'],
                ['class' => \App\Widgets\InbetweenV2\InbetweenV2WhereWeFocusWidget::class, 'view' => 'widgets.inbetween_v2.where_we_focus'],
                ['class' => \App\Widgets\InbetweenV2\InbetweenV2FounderWidget::class, 'view' => 'widgets.inbetween_v2.founder'],
                ['class' => \App\Widgets\InbetweenV2\InbetweenV2OurClientsWidget::class, 'view' => 'widgets.inbetween_v2.our_clients'],
                ['class' => \App\Widgets\InbetweenV2\InbetweenV2BusinessWidget::class, 'view' => 'widgets.inbetween_v2.business'],
                ['class' => \App\Widgets\InbetweenV2\InbetweenV2FooterWidget::class, 'view' => 'widgets.inbetween_v2.footer'],
            ];
        @endphp
        @foreach($desktopWidgets as $dw)
            @php
                $st = [];
                if (class_exists($dw['class'])) {
                    $inst = new $dw['class']([]);
                    $st = method_exists($inst, 'getMergedSettings') ? $inst->getMergedSettings() : [];
                }
            @endphp
            @if(view()->exists($dw['view']))
                @include($dw['view'], ['settings' => $st])
            @endif
        @endforeach
    @endif
</main>

{{-- Mobile Natural Scrolling Experience (< 1024px) --}}
<div class="inbetween-mobile-container w-full min-h-screen block lg:hidden" id="inbetween-mobile-container" aria-label="Mobile Natural Scrolling Experience">
    @include('themes.inbetween_v2.components.mobile-experience')
</div>
@endsection
