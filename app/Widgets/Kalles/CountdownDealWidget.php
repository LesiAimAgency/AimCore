<?php

namespace App\Widgets\Kalles;

use App\Models\Product;
use App\Widgets\BaseWidget;

class CountdownDealWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Countdown Deal',
            'description' => 'Sản phẩm giảm giá có đếm ngược thời gian (Flash Sale)',
            'category' => 'kalles',
            'version' => '1.0.0',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>',
            'variants' => ['default' => 'Banner ngang', 'grid' => 'Sản phẩm trong Grid'],
            'fields' => [
                ['name' => 'title', 'label' => 'Tiêu đề', 'type' => 'text', 'default' => 'Deal Of The Day'],
                ['name' => 'subtitle', 'label' => 'Mô tả ngắn', 'type' => 'text'],
                ['name' => 'end_time', 'label' => 'Thời gian kết thúc', 'type' => 'text', 'placeholder' => 'VD: 2026-12-31 23:59:59'],
                ['name' => 'product_id', 'label' => 'Chọn Sản Phẩm (ID)', 'type' => 'number'],
                ['name' => 'bg_image', 'label' => 'Ảnh nền (Cho Banner ngang)', 'type' => 'image'],
            ],
            'settings' => ['cacheable' => true, 'cache_ttl' => 60], // Cache ngắn vì có countdown
        ];
    }

    public function render(): string
    {
        $title = htmlspecialchars($this->get('title', 'Deal Of The Day'));
        $subtitle = htmlspecialchars($this->get('subtitle', ''));
        $endTime = htmlspecialchars($this->get('end_time', ''));
        $productId = $this->get('product_id');
        $bgImage = $this->get('bg_image');
        $variant = $this->getVariant('default');

        if (! $endTime) {
            return '<div class="alert alert-warning">Vui lòng cấu hình thời gian kết thúc (End Time) cho Countdown Deal.</div>';
        }

        $product = null;
        if ($productId) {
            $product = Product::find($productId);
        }

        if ($variant === 'default') {
            return $this->renderBannerVariant($title, $subtitle, $endTime, $product, $bgImage);
        } else {
            return $this->renderGridVariant($title, $endTime, $product);
        }
    }

    private function renderBannerVariant($title, $subtitle, $endTime, $product, $bgImage): string
    {
        $bgHtml = $bgImage ? "background-image: url('{$bgImage}'); background-size: cover; background-position: center;" : 'background-color: #f5f5f5;';

        $productHtml = '';
        if ($product) {
            $img = $product->image ? asset('storage/'.$product->image) : asset('assets/images/placeholder.jpg');
            $pTitle = htmlspecialchars($product->name);
            $pPrice = number_format($product->price ?? 0).' đ';
            $pUrl = url('/product/'.$product->slug);
            $productHtml = <<<HTML
            <div class="d-flex align-items-center bg-white p-3 rounded shadow-sm mt-4" style="max-width: 400px; margin: 0 auto;">
                <img src="{$img}" alt="{$pTitle}" style="width:80px; height:80px; object-fit:cover;" class="rounded me-3">
                <div class="text-start">
                    <h6 class="mb-1"><a href="{$pUrl}" class="text-dark text-decoration-none">{$pTitle}</a></h6>
                    <span class="text-danger fw-bold">{$pPrice}</span>
                </div>
            </div>
HTML;
        }

        return <<<HTML
<div class="kalles-countdown-banner py-5" style="{$bgHtml}">
    <div class="container text-center py-5">
        <h2 class="display-5 fw-bold mb-2">{$title}</h2>
        <p class="fs-16 mb-4">{$subtitle}</p>
        
        <div class="d-inline-flex gap-3 justify-content-center flex-wrap" data-countdown="{$endTime}">
            <div class="bg-dark text-white rounded p-3 text-center" style="min-width: 80px;">
                <span class="d-block fs-3 fw-bold countdown-days">00</span>
                <span class="d-block fs-14 text-uppercase">Days</span>
            </div>
            <div class="bg-dark text-white rounded p-3 text-center" style="min-width: 80px;">
                <span class="d-block fs-3 fw-bold countdown-hours">00</span>
                <span class="d-block fs-14 text-uppercase">Hrs</span>
            </div>
            <div class="bg-dark text-white rounded p-3 text-center" style="min-width: 80px;">
                <span class="d-block fs-3 fw-bold countdown-minutes">00</span>
                <span class="d-block fs-14 text-uppercase">Mins</span>
            </div>
            <div class="bg-dark text-white rounded p-3 text-center" style="min-width: 80px;">
                <span class="d-block fs-3 fw-bold countdown-seconds">00</span>
                <span class="d-block fs-14 text-uppercase">Secs</span>
            </div>
        </div>
        
        {$productHtml}
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const countdowns = document.querySelectorAll('[data-countdown]');
        countdowns.forEach(el => {
            const dest = new Date(el.getAttribute('data-countdown')).getTime();
            const daysEl = el.querySelector('.countdown-days');
            const hoursEl = el.querySelector('.countdown-hours');
            const minsEl = el.querySelector('.countdown-minutes');
            const secsEl = el.querySelector('.countdown-seconds');
            
            const timer = setInterval(() => {
                const now = new Date().getTime();
                const diff = dest - now;
                if (diff <= 0) {
                    clearInterval(timer);
                    return;
                }
                daysEl.innerText = Math.floor(diff / (1000 * 60 * 60 * 24)).toString().padStart(2, '0');
                hoursEl.innerText = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)).toString().padStart(2, '0');
                minsEl.innerText = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60)).toString().padStart(2, '0');
                secsEl.innerText = Math.floor((diff % (1000 * 60)) / 1000).toString().padStart(2, '0');
            }, 1000);
        });
    });
</script>
HTML;
    }

    private function renderGridVariant($title, $endTime, $product): string
    {
        if (! $product) {
            return '<div class="alert alert-warning">Vui lòng chọn sản phẩm cho Grid Deal.</div>';
        }

        $img = $product->image ? asset('storage/'.$product->image) : asset('assets/images/placeholder.jpg');
        $pTitle = htmlspecialchars($product->name);
        $pPrice = number_format($product->price ?? 0).' đ';
        $pUrl = url('/product/'.$product->slug);

        return <<<HTML
        <div class="kalles-deal-grid text-center p-3 border rounded">
            <h5 class="fw-bold mb-3 text-danger">{$title}</h5>
            <div class="position-relative overflow-hidden mb-3">
                <a href="{$pUrl}" class="d-block">
                    <img src="{$img}" alt="{$pTitle}" class="img-fluid w-100 object-fit-cover" style="aspect-ratio: 1/1;">
                </a>
            </div>
            <h6 class="fs-14 fw-medium mb-1"><a href="{$pUrl}" class="text-dark text-decoration-none">{$pTitle}</a></h6>
            <span class="text-danger fw-bold fs-16 mb-3 d-block">{$pPrice}</span>
            
            <div class="d-flex gap-2 justify-content-center mb-2" data-countdown="{$endTime}">
                <div class="bg-light rounded p-2 text-center" style="width: 50px;">
                    <span class="d-block fs-14 fw-bold countdown-days">00</span>
                    <span class="d-block fs-12 text-muted">D</span>
                </div>
                <div class="bg-light rounded p-2 text-center" style="width: 50px;">
                    <span class="d-block fs-14 fw-bold countdown-hours">00</span>
                    <span class="d-block fs-12 text-muted">H</span>
                </div>
                <div class="bg-light rounded p-2 text-center" style="width: 50px;">
                    <span class="d-block fs-14 fw-bold countdown-minutes">00</span>
                    <span class="d-block fs-12 text-muted">M</span>
                </div>
                <div class="bg-light rounded p-2 text-center" style="width: 50px;">
                    <span class="d-block fs-14 fw-bold countdown-seconds">00</span>
                    <span class="d-block fs-12 text-muted">S</span>
                </div>
            </div>
        </div>
HTML;
    }
}
