<div class="widget-statistics @if($widget->css_class) {{ $widget->css_class }} @endif">
    @if(!empty($config['title']))
        <h4 class="widget-title mb-4">{{ $config['title'] }}</h4>
    @endif

    <div class="stats-list">
        @if($config['show_today'] ?? true)
            <div class="stats-item d-flex justify-content-between align-items-center mb-2">
                <span class="stats-label">
                    <i class="fa-solid fa-calendar-day me-2 text-primary"></i>
                    {{ __('frontend.widget_stats_today') }}
                </span>
                <span class="stats-value fw-bold text-dark">{{ number_format($stats['today']) }}</span>
            </div>
        @endif

        @if($config['show_week'] ?? true)
            <div class="stats-item d-flex justify-content-between align-items-center mb-2">
                <span class="stats-label">
                    <i class="fa-solid fa-calendar-week me-2 text-info"></i>
                    {{ __('frontend.widget_stats_week') }}
                </span>
                <span class="stats-value fw-bold text-dark">{{ number_format($stats['week']) }}</span>
            </div>
        @endif

        @if($config['show_month'] ?? true)
            <div class="stats-item d-flex justify-content-between align-items-center mb-2">
                <span class="stats-label">
                    <i class="fa-solid fa-calendar-days me-2 text-success"></i>
                    {{ __('frontend.widget_stats_month') }}
                </span>
                <span class="stats-value fw-bold text-dark">{{ number_format($stats['month']) }}</span>
            </div>
        @endif

        @if($config['show_year'] ?? true)
            <div class="stats-item d-flex justify-content-between align-items-center mb-2">
                <span class="stats-label">
                    <i class="fa-solid fa-calendar-check me-2 text-warning"></i>
                    {{ __('frontend.widget_stats_year') }}
                </span>
                <span class="stats-value fw-bold text-dark">{{ number_format($stats['year']) }}</span>
            </div>
        @endif

        @if($config['show_total'] ?? true)
            <div class="stats-item d-flex justify-content-between align-items-center pt-2 mt-2 border-top">
                <span class="stats-label fw-bold">
                    <i class="fa-solid fa-chart-simple me-2 text-danger"></i>
                    {{ __('frontend.widget_stats_total') }}
                </span>
                <span class="stats-value fw-bold text-danger">{{ number_format($stats['total']) }}</span>
            </div>
        @endif
    </div>
</div>

<style>
.widget-statistics {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
}
.stats-item {
    padding: 8px 0;
}
.stats-label {
    font-size: 0.95rem;
    color: #6c757d;
}
.stats-value {
    font-size: 1.1rem;
}
.widget-title {
    font-size: 1.25rem;
    font-weight: 700;
    position: relative;
    padding-bottom: 10px;
}
.widget-title::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 40px;
    height: 3px;
    background: var(--primary-color, #27ae60);
    border-radius: 2px;
}
</style>
