<?php

namespace App\Widgets\Kalles;

use App\Models\Product;
use App\Widgets\BaseWidget;

class ProductGridWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Product Grid',
            'description' => 'Lưới sản phẩm cơ bản (Hỗ trợ Grid, Packery, Masonry)',
            'category' => 'kalles',
            'version' => '1.0.0',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>',
            'variants' => ['grid' => 'Lưới Grid (Đều nhau)', 'masonry' => 'Lưới Masonry (So le)'],
            'fields' => [
                ['name' => 'title', 'label' => 'Tiêu đề khối', 'type' => 'text', 'default' => 'New Arrivals'],
                ['name' => 'subtitle', 'label' => 'Mô tả ngắn', 'type' => 'text'],
                ['name' => 'data_source', 'label' => 'Nguồn dữ liệu', 'type' => 'select', 'options' => [
                    'latest' => 'Sản phẩm mới nhất',
                    'best_seller' => 'Bán chạy nhất',
                    'category' => 'Theo Danh Mục',
                ], 'default' => 'latest'],
                ['name' => 'category_id', 'label' => 'ID Danh Mục (Nếu chọn Theo Danh Mục)', 'type' => 'number'],
                ['name' => 'limit', 'label' => 'Số lượng sản phẩm', 'type' => 'number', 'default' => 8],
                ['name' => 'columns', 'label' => 'Số cột (Desktop)', 'type' => 'select', 'options' => ['2' => '2 Cột', '3' => '3 Cột', '4' => '4 Cột', '5' => '5 Cột', '6' => '6 Cột'], 'default' => '4'],
                ['name' => 'show_loadmore', 'label' => 'Nút Load More', 'type' => 'checkbox', 'default' => false],
            ],
            'settings' => ['cacheable' => true, 'cache_ttl' => 3600],
        ];
    }

    public function render(): string
    {
        $title = htmlspecialchars($this->get('title', ''));
        $subtitle = htmlspecialchars($this->get('subtitle', ''));
        $source = $this->get('data_source', 'latest');
        $categoryId = $this->get('category_id');
        $limit = (int) $this->get('limit', 8);
        $columns = (int) $this->get('columns', 4);
        $variant = $this->getVariant('grid');
        $showLoadmore = $this->get('show_loadmore', false);

        $products = $this->getProducts($source, $categoryId, $limit);

        if ($products->isEmpty()) {
            return '<div class="alert alert-info">Chưa có sản phẩm.</div>';
        }

        $colClass = 'col-lg-'.(12 / $columns).' col-md-4 col-6 mb-4';
        $productHtml = '';

        foreach ($products as $index => $product) {
            // Tính toán class height giả định cho Masonry
            $masonryClass = '';
            if ($variant === 'masonry') {
                $masonryClass = ($index % 2 == 0) ? 'masonry-tall' : 'masonry-short';
            }

            $productHtml .= "<div class=\"{$colClass} grid-item\">".$this->renderProductCard($product, $masonryClass).'</div>';
        }

        $gridClass = $variant === 'masonry' ? 'row kalles-masonry' : 'row';
        $masonryAttr = $variant === 'masonry' ? 'data-masonry=\'{"percentPosition": true }\'' : '';

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

        $loadmoreHtml = '';
        if ($showLoadmore) {
            $loadmoreHtml = '<div class="text-center mt-4"><a href="#" class="btn btn-outline-dark rounded-pill px-5 py-2 fw-medium text-uppercase fs-14" style="letter-spacing:1px;">Load More</a></div>';
        }

        return <<<HTML
<div class="kalles-product-grid py-5">
    <div class="container">
        {$headerHtml}
        <div class="{$gridClass}" {$masonryAttr}>
            {$productHtml}
        </div>
        {$loadmoreHtml}
    </div>
</div>
HTML;
    }

    private function getProducts(string $source, ?int $categoryId, int $limit)
    {
        $query = Product::where('status', 'published')->with(['category']);

        if ($source === 'category' && $categoryId) {
            $query->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('product_categories.id', $categoryId);
            });
        } elseif ($source === 'best_seller') {
            $query->orderBy('id', 'asc');
        } else {
            $query->latest();
        }

        return $query->take($limit)->get();
    }

    private function renderProductCard($product, string $masonryClass = ''): string
    {
        $img = $product->image ? asset('storage/'.$product->image) : asset('assets/images/placeholder.jpg');
        $title = htmlspecialchars($product->name);
        $price = number_format($product->price ?? 0).' đ';
        $url = url('/product/'.$product->slug);

        $aspectRatio = $masonryClass === 'masonry-tall' ? '3/4' : '1/1';

        return <<<HTML
        <div class="kalles-product-card text-center position-relative group h-100">
            <div class="position-relative overflow-hidden mb-3">
                <a href="{$url}" class="d-block">
                    <img src="{$img}" alt="{$title}" class="img-fluid w-100 object-fit-cover" style="aspect-ratio: {$aspectRatio}; transition: transform 0.5s;">
                </a>
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
