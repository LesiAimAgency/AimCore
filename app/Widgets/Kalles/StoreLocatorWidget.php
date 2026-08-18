<?php

namespace App\Widgets\Kalles;

use App\Models\Branch;
use App\Widgets\BaseWidget; // Giả sử CMS Core có Model Branch

class StoreLocatorWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Store Locator',
            'description' => 'Hiển thị bản đồ và danh sách cửa hàng/địa lý',
            'category' => 'kalles',
            'version' => '1.0.0',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.242-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>',
            'variants' => ['default' => 'Bản đồ lớn + Danh sách', 'simple' => 'Chỉ bản đồ (Iframe)'],
            'fields' => [
                ['name' => 'title', 'label' => 'Tiêu đề', 'type' => 'text', 'default' => 'Find a store'],
                ['name' => 'subtitle', 'label' => 'Mô tả', 'type' => 'text'],
                ['name' => 'iframe_src', 'label' => 'Mã nhúng Google Map (src)', 'type' => 'text', 'placeholder' => 'https://www.google.com/maps/embed?...'],
                ['name' => 'show_branches', 'label' => 'Hiển thị danh sách chi nhánh (Tự động lấy từ DB)', 'type' => 'checkbox', 'default' => true],
            ],
            'settings' => ['cacheable' => true, 'cache_ttl' => 3600],
        ];
    }

    public function render(): string
    {
        $title = htmlspecialchars($this->get('title', ''));
        $subtitle = htmlspecialchars($this->get('subtitle', ''));
        $iframe = htmlspecialchars($this->get('iframe_src', ''));
        $showBranches = $this->get('show_branches', true);
        $variant = $this->getVariant('default');

        $mapHtml = '';
        if ($iframe) {
            $mapHtml = "<iframe src=\"{$iframe}\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>";
        } else {
            $mapHtml = '<div class="w-100 bg-light d-flex align-items-center justify-content-center text-muted" style="height:450px;">Bản đồ chưa được cấu hình</div>';
        }

        if ($variant === 'simple') {
            return <<<HTML
<div class="kalles-store-map">
    {$mapHtml}
</div>
HTML;
        }

        // Default layout with branches
        $branchesHtml = '';
        if ($showBranches && class_exists(Branch::class)) {
            $branches = Branch::where('status', 'active')->get();
            foreach ($branches as $branch) {
                $bName = htmlspecialchars($branch->name);
                $bAddress = htmlspecialchars($branch->address);
                $bPhone = htmlspecialchars($branch->phone);

                $branchesHtml .= <<<HTML
                <div class="store-item p-3 border-bottom">
                    <h6 class="fw-bold mb-2">{$bName}</h6>
                    <p class="text-muted fs-14 mb-1"><i class="las la-map-marker me-1"></i>{$bAddress}</p>
                    <p class="text-dark fw-medium fs-14 mb-0"><i class="las la-phone me-1"></i>{$bPhone}</p>
                </div>
HTML;
            }
        }

        $headerHtml = '';
        if ($title || $subtitle) {
            $headerHtml = '<div class="text-center mb-5">';
            if ($title) {
                $headerHtml .= "<h3 class=\"fw-bold mb-2\">{$title}</h3>";
            }
            if ($subtitle) {
                $headerHtml .= "<p class=\"text-muted fs-14\">{$subtitle}</p>";
            }
            $headerHtml .= '</div>';
        }

        return <<<HTML
<div class="kalles-store-locator py-5">
    <div class="container">
        {$headerHtml}
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="rounded overflow-hidden shadow-sm">
                    {$mapHtml}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bg-light rounded p-4 h-100 overflow-auto" style="max-height: 450px;">
                    <h5 class="fw-bold mb-4">Our Stores</h5>
                    {$branchesHtml}
                </div>
            </div>
        </div>
    </div>
</div>
HTML;
    }
}
