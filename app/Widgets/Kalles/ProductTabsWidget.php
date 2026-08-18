<?php

namespace App\Widgets\Kalles;

use App\Models\Product;
use App\Widgets\BaseWidget;

class ProductTabsWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Product Tabs',
            'description' => 'Hiển thị sản phẩm theo các Tab (Danh mục, Hàng mới, Bán chạy)',
            'category' => 'kalles',
            'version' => '1.0.0',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>',
            'variants' => ['grid' => 'Lưới thông thường', 'slider' => 'Slider (Carousel)'],
            'fields' => [
                ['name' => 'title', 'label' => 'Tiêu đề khối', 'type' => 'text', 'default' => 'Trending Products'],
                ['name' => 'subtitle', 'label' => 'Mô tả ngắn', 'type' => 'text', 'default' => 'Top view in this week'],
                [
                    'name' => 'tabs',
                    'label' => 'Danh sách Tabs',
                    'type' => 'repeatable',
                    'max' => 5,
                    'fields' => [
                        ['name' => 'tab_name', 'label' => 'Tên Tab', 'type' => 'text', 'placeholder' => 'VD: Best Sellers'],
                        ['name' => 'data_source', 'label' => 'Nguồn dữ liệu', 'type' => 'select', 'options' => [
                            'latest' => 'Sản phẩm mới nhất',
                            'best_seller' => 'Bán chạy nhất',
                            'category' => 'Theo Danh Mục (Chọn bên dưới)',
                        ], 'default' => 'latest'],
                        ['name' => 'category_id', 'label' => 'ID Danh Mục (Nếu chọn Theo Danh Mục)', 'type' => 'number'],
                    ],
                ],
                ['name' => 'limit', 'label' => 'Số lượng sản phẩm mỗi Tab', 'type' => 'number', 'default' => 8],
                ['name' => 'columns', 'label' => 'Số cột (Desktop)', 'type' => 'select', 'options' => ['3' => '3 Cột', '4' => '4 Cột', '5' => '5 Cột'], 'default' => '4'],
            ],
            'settings' => ['cacheable' => true, 'cache_ttl' => 3600],
        ];
    }

    public function render(): string
    {
        $title = htmlspecialchars($this->get('title', ''));
        $subtitle = htmlspecialchars($this->get('subtitle', ''));
        $tabs = $this->get('tabs', []);
        $limit = (int) $this->get('limit', 8);
        $columns = (int) $this->get('columns', 4);
        $variant = $this->getVariant('grid');

        if (empty($tabs)) {
            return '<div class="alert alert-info">Vui lòng cấu hình các Tab hiển thị.</div>';
        }

        $tabNav = '';
        $tabContent = '';

        foreach ($tabs as $index => $tab) {
            $tabName = htmlspecialchars($tab['tab_name'] ?? 'Tab '.($index + 1));
            $source = $tab['data_source'] ?? 'latest';
            $categoryId = $tab['category_id'] ?? null;
            $active = $index === 0 ? 'active' : '';
            $show = $index === 0 ? 'show active' : '';
            $tabId = 'tab-product-'.uniqid().'-'.$index;

            $tabNav .= <<<HTML
            <li class="nav-item" role="presentation">
                <button class="nav-link text-uppercase fs-14 fw-medium text-muted {$active}" id="{$tabId}-tab" data-bs-toggle="tab" data-bs-target="#{$tabId}" type="button" role="tab" aria-controls="{$tabId}" aria-selected="true" style="letter-spacing: 2px;">{$tabName}</button>
            </li>
HTML;
            // Lấy dữ liệu sản phẩm
            $products = $this->getProducts($source, $categoryId, $limit);

            $productHtml = '';
            $colClass = 'col-lg-'.(12 / $columns).' col-md-4 col-6';

            if ($variant === 'slider') {
                $flickityOpts = htmlentities(json_encode([
                    'cellAlign' => 'left',
                    'contain' => true,
                    'pageDots' => false,
                    'prevNextButtons' => true,
                    'groupCells' => '100%',
                    'wrapAround' => true,
                ]));
                $productHtml .= "<div class=\"row g-4 kalles-slider\" data-flickity='{$flickityOpts}'>";
                foreach ($products as $product) {
                    $productHtml .= "<div class=\"{$colClass}\">".$this->renderProductCard($product).'</div>';
                }
                $productHtml .= '</div>';
            } else {
                $productHtml .= '<div class="row g-4">';
                foreach ($products as $product) {
                    $productHtml .= "<div class=\"{$colClass}\">".$this->renderProductCard($product).'</div>';
                }
                $productHtml .= '</div>';
            }

            $tabContent .= <<<HTML
            <div class="tab-pane fade {$show}" id="{$tabId}" role="tabpanel" aria-labelledby="{$tabId}-tab" tabindex="0">
                {$productHtml}
            </div>
HTML;
        }

        return <<<HTML
<div class="kalles-product-tabs py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h3 class="fw-bold mb-2">{$title}</h3>
            <p class="text-muted fs-14">{$subtitle}</p>
        </div>
        
        <ul class="nav nav-tabs justify-content-center border-0 gap-4 mb-4" role="tablist">
            {$tabNav}
        </ul>
        
        <div class="tab-content">
            {$tabContent}
        </div>
    </div>
</div>
HTML;
    }

    private function getProducts(string $source, ?int $categoryId, int $limit)
    {
        $query = Product::where('status', 'published')
            ->with(['category']); // Eager loading tránh N+1 (Master Prompt Rule 23)

        if ($source === 'category' && $categoryId) {
            $query->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('product_categories.id', $categoryId);
            });
        } elseif ($source === 'best_seller') {
            // Giả lập logic bán chạy (nếu có cột views/sales thì orderBy)
            $query->orderBy('id', 'asc'); // Tạm thời
        } else {
            // Latest
            $query->latest();
        }

        return $query->take($limit)->get();
    }

    private function renderProductCard($product): string
    {
        $img = $product->image ? asset('storage/'.$product->image) : asset('assets/images/placeholder.jpg');
        $title = htmlspecialchars($product->name);
        $price = number_format($product->price ?? 0).' đ';
        $url = url('/product/'.$product->slug);

        return <<<HTML
        <div class="kalles-product-card text-center position-relative group">
            <div class="position-relative overflow-hidden mb-3">
                <a href="{$url}" class="d-block">
                    <img src="{$img}" alt="{$title}" class="img-fluid w-100 object-fit-cover" style="aspect-ratio: 3/4; transition: transform 0.5s;">
                </a>
                <!-- Actions -->
                <div class="position-absolute bottom-0 start-0 w-100 p-2 d-flex justify-content-center gap-2 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-full group-hover:translate-y-0" style="background: rgba(255,255,255,0.9);">
                    <button class="btn btn-sm btn-dark rounded-circle" style="width:36px; height:36px;" title="Thêm vào giỏ"><i class="las la-shopping-bag"></i></button>
                    <button class="btn btn-sm btn-light rounded-circle" style="width:36px; height:36px;" title="Yêu thích"><i class="lar la-heart"></i></button>
                    <button class="btn btn-sm btn-light rounded-circle" style="width:36px; height:36px;" title="Xem nhanh"><i class="las la-eye"></i></button>
                </div>
            </div>
            <h6 class="fs-14 fw-medium mb-1"><a href="{$url}" class="text-dark text-decoration-none">{$title}</a></h6>
            <span class="text-muted fs-14">{$price}</span>
        </div>
HTML;
    }
}
