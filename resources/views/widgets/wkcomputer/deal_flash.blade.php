@php
    $endTs = $endTimestamp ?? (now()->addDays(3)->timestamp * 1000);
@endphp

<section class="wk-widget-deal-flash" style="padding:16px 0 24px;">
    <div class="wk-container">
        <div class="wk-flash-section">
            {{-- Flash Sale Header --}}
            <div class="wk-flash-header">
                <div class="wk-flash-title-wrap">
                    <div class="wk-flash-badge">
                        <i class="fas fa-bolt"></i> {{ $title ?? 'FLASH SALE GAMING GEAR' }}
                    </div>
                </div>

                {{-- Countdown timer --}}
                <div class="wk-countdown-box" data-end="{{ $endTs }}">
                    <span class="wk-cd-label"><i class="far fa-clock"></i> KẾT THÚC SAU</span>
                    <div class="wk-cd-timer">
                        <div class="wk-cd-unit"><span data-cd="d">00</span><small>NGÀY</small></div>
                        <span class="wk-cd-sep">:</span>
                        <div class="wk-cd-unit"><span data-cd="h">00</span><small>GIỜ</small></div>
                        <span class="wk-cd-sep">:</span>
                        <div class="wk-cd-unit"><span data-cd="m">00</span><small>PHÚT</small></div>
                        <span class="wk-cd-sep">:</span>
                        <div class="wk-cd-unit"><span data-cd="s">00</span><small>GIÂY</small></div>
                    </div>
                </div>

                <a href="{{ route('shop.index') }}?on_sale=1" class="wk-flash-view-all">
                    Xem tất cả <i class="fas fa-chevron-right"></i>
                </a>
            </div>

            {{-- Products Grid --}}
            <div class="wk-flash-grid">
                @forelse($products as $product)
                    <div class="wk-flash-item">
                        <x-shop.product-card :product="$product" />

                        @if(isset($product->flash_sold))
                        <div class="wk-flash-progress-wrap">
                            <div class="wk-flash-progress-bar">
                                <div class="wk-flash-progress-fill" style="width: {{ $product->flash_percent ?? 65 }}%;"></div>
                            </div>
                            <div class="wk-flash-progress-text">
                                <i class="fas fa-fire"></i> Đã bán {{ $product->flash_sold }}/{{ $product->flash_total }}
                            </div>
                        </div>
                        @endif
                    </div>
                @empty
                    <div class="wk-flash-empty">
                        Đang cập nhật các sản phẩm khuyến mãi Flash Sale...
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<style>
.wk-flash-section {
    background: linear-gradient(135deg, #111827 0%, #1e1b4b 50%, #431407 100%);
    border-radius: 14px;
    padding: 20px;
    border: 1px solid rgba(239, 68, 68, 0.3);
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.4), 0 0 15px rgba(225, 29, 72, 0.2);
    position: relative;
    overflow: hidden;
}
.wk-flash-section::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -20%;
    width: 140%;
    height: 200%;
    background: radial-gradient(circle at 30% 20%, rgba(225, 29, 72, 0.18) 0%, transparent 60%);
    pointer-events: none;
}
.wk-flash-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
    margin-bottom: 20px;
    padding-bottom: 14px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    position: relative;
    z-index: 2;
}
.wk-flash-title-wrap {
    display: flex;
    align-items: center;
    gap: 12px;
}
.wk-flash-badge {
    background: linear-gradient(90deg, #e11d48 0%, #f43f5e 100%);
    color: #ffffff;
    font-size: 16px;
    font-weight: 800;
    padding: 8px 18px;
    border-radius: 8px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 4px 14px rgba(225, 29, 72, 0.4);
}
.wk-flash-badge i {
    color: #facc15;
    animation: flashPulse 1.2s ease-in-out infinite alternate;
}
@keyframes flashPulse {
    0% { transform: scale(1); filter: drop-shadow(0 0 2px #facc15); }
    100% { transform: scale(1.3); filter: drop-shadow(0 0 8px #facc15); }
}
.wk-countdown-box {
    display: flex;
    align-items: center;
    gap: 10px;
    background: rgba(0, 0, 0, 0.4);
    padding: 6px 14px;
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.12);
}
.wk-cd-label {
    color: #cbd5e1;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    display: flex;
    align-items: center;
    gap: 5px;
}
.wk-cd-timer {
    display: flex;
    align-items: center;
    gap: 5px;
}
.wk-cd-unit {
    background: #0f172a;
    color: #ffffff;
    border: 1px solid #ef4444;
    padding: 3px 7px;
    border-radius: 6px;
    min-width: 38px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.5);
}
.wk-cd-unit span {
    font-size: 15px;
    font-weight: 900;
    font-family: 'Roboto Condensed', monospace;
    line-height: 1.1;
    color: #fef08a;
}
.wk-cd-unit small {
    font-size: 8px;
    color: #94a3b8;
    font-weight: 600;
}
.wk-cd-sep {
    color: #ef4444;
    font-weight: 900;
    font-size: 14px;
    animation: blinkSep 1s infinite;
}
@keyframes blinkSep {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.3; }
}
.wk-flash-view-all {
    color: #fecdd3;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s ease;
    margin-left: auto;
    background: rgba(255, 255, 255, 0.08);
    padding: 6px 14px;
    border-radius: 6px;
}
.wk-flash-view-all:hover {
    color: #ffffff;
    background: rgba(225, 29, 72, 0.3);
    transform: translateX(3px);
}
.wk-flash-grid {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 12px;
    position: relative;
    z-index: 2;
}
@media (max-width: 1200px) {
    .wk-flash-grid { grid-template-columns: repeat(4, 1fr); }
}
@media (max-width: 991px) {
    .wk-flash-grid { grid-template-columns: repeat(3, 1fr); }
    .wk-flash-view-all { margin-left: 0; }
}
@media (max-width: 576px) {
    .wk-flash-grid { grid-template-columns: repeat(2, 1fr); gap: 8px; }
    .wk-flash-header { flex-direction: column; align-items: flex-start; }
}
.wk-flash-item {
    background: #ffffff;
    border-radius: 10px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}
.wk-flash-item:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.25);
}
.wk-flash-progress-wrap {
    padding: 8px 10px 10px;
    background: #fff;
    border-top: 1px dashed #e2e8f0;
}
.wk-flash-progress-bar {
    height: 12px;
    background: #fee2e2;
    border-radius: 6px;
    overflow: hidden;
    position: relative;
}
.wk-flash-progress-fill {
    height: 100%;
    background: linear-gradient(90deg, #ff416c 0%, #ff4b2b 100%);
    border-radius: 6px;
    transition: width 0.4s ease;
}
.wk-flash-progress-text {
    font-size: 10px;
    font-weight: 700;
    color: #991b1b;
    margin-top: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 4px;
    text-transform: uppercase;
}
.wk-flash-empty {
    grid-column: 1 / -1;
    padding: 40px;
    text-align: center;
    color: #ffffff;
    background: rgba(0, 0, 0, 0.3);
    border-radius: 8px;
    font-size: 14px;
}
</style>

<script>
(function() {
    function initWkDealFlashTimer() {
        document.querySelectorAll('.wk-countdown-box[data-end]').forEach(function(box) {
            if (box.dataset.cdInit === 'true') return;
            box.dataset.cdInit = 'true';

            var endTs = parseInt(box.dataset.end, 10);
            if (isNaN(endTs)) return;

            var elD = box.querySelector('[data-cd="d"]');
            var elH = box.querySelector('[data-cd="h"]');
            var elM = box.querySelector('[data-cd="m"]');
            var elS = box.querySelector('[data-cd="s"]');

            function update() {
                var now = Date.now();
                var diff = Math.max(0, endTs - now);

                var secondsTotal = Math.floor(diff / 1000);
                var d = Math.floor(secondsTotal / (3600 * 24));
                var h = Math.floor((secondsTotal % (3600 * 24)) / 3600);
                var m = Math.floor((secondsTotal % 3600) / 60);
                var s = secondsTotal % 60;

                if (elD) elD.textContent = d < 10 ? '0' + d : d;
                if (elH) elH.textContent = h < 10 ? '0' + h : h;
                if (elM) elM.textContent = m < 10 ? '0' + m : m;
                if (elS) elS.textContent = s < 10 ? '0' + s : s;
            }

            update();
            setInterval(update, 1000);
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initWkDealFlashTimer);
    } else {
        initWkDealFlashTimer();
    }
})();
</script>
