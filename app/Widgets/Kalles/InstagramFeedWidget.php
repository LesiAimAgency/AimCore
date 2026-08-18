<?php

namespace App\Widgets\Kalles;

use App\Widgets\BaseWidget;

class InstagramFeedWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Instagram Feed',
            'description' => 'Lưới ảnh Instagram (hỗ trợ ảnh tĩnh hoặc API)',
            'category' => 'kalles',
            'version' => '1.0.0',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>',
            'variants' => ['grid' => 'Lưới liền kề (Không khoảng trống)', 'carousel' => 'Thanh cuộn (Carousel)'],
            'fields' => [
                ['name' => 'title', 'label' => 'Tiêu đề khối', 'type' => 'text', 'default' => '@kalles_instagram'],
                ['name' => 'subtitle', 'label' => 'Mô tả ngắn', 'type' => 'text'],
                [
                    'name' => 'images',
                    'label' => 'Danh sách Ảnh (Tải lên thủ công)',
                    'type' => 'repeatable',
                    'max' => 12,
                    'fields' => [
                        ['name' => 'image', 'label' => 'Ảnh', 'type' => 'image'],
                        ['name' => 'link', 'label' => 'Link bài post (Tùy chọn)', 'type' => 'url', 'default' => '#'],
                    ],
                ],
                ['name' => 'columns', 'label' => 'Số cột (Chỉ áp dụng Grid)', 'type' => 'select', 'options' => ['4' => '4', '5' => '5', '6' => '6'], 'default' => '5'],
            ],
            'settings' => ['cacheable' => true, 'cache_ttl' => 3600],
        ];
    }

    public function render(): string
    {
        $title = htmlspecialchars($this->get('title', ''));
        $subtitle = htmlspecialchars($this->get('subtitle', ''));
        $images = $this->get('images', []);
        $columns = (int) $this->get('columns', 5);
        $variant = $this->getVariant('grid');

        if (empty($images)) {
            return '<div class="alert alert-info">Vui lòng tải ảnh Instagram.</div>';
        }

        $itemsHtml = '';
        $colClass = 'col-lg-'.(12 / $columns).' col-md-4 col-6 p-0'; // p-0 để liền kề

        if ($variant === 'carousel') {
            $flickityOpts = htmlentities(json_encode([
                'cellAlign' => 'left',
                'contain' => true,
                'pageDots' => false,
                'prevNextButtons' => false,
                'groupCells' => '100%',
                'wrapAround' => true,
                'autoPlay' => 3000,
            ]));
            $itemsHtml .= "<div class=\"w-100\" data-flickity='{$flickityOpts}'>";

            // Fix colClass for carousel item to take up % width
            $percent = 100 / $columns;
            foreach ($images as $imgData) {
                $itemsHtml .= "<div style=\"width: {$percent}%;\">".$this->renderItem($imgData).'</div>';
            }
            $itemsHtml .= '</div>';
            $gridClass = '';
        } else {
            $itemsHtml .= '<div class="row g-0">';
            foreach ($images as $imgData) {
                $itemsHtml .= "<div class=\"{$colClass}\">".$this->renderItem($imgData).'</div>';
            }
            $itemsHtml .= '</div>';
            $gridClass = 'container-fluid px-0';
        }

        $headerHtml = '';
        if ($title || $subtitle) {
            $headerHtml = '<div class="text-center mb-4">';
            if ($title) {
                $headerHtml .= "<h4 class=\"fw-bold mb-2\"><i class=\"lab la-instagram me-2\"></i>{$title}</h4>";
            }
            if ($subtitle) {
                $headerHtml .= "<p class=\"text-muted fs-14\">{$subtitle}</p>";
            }
            $headerHtml .= '</div>';
        }

        return <<<HTML
<div class="kalles-instagram-feed py-5 overflow-hidden">
    {$headerHtml}
    <div class="{$gridClass}">
        {$itemsHtml}
    </div>
</div>
HTML;
    }

    private function renderItem(array $imgData): string
    {
        $img = htmlspecialchars($imgData['image'] ?? '');
        $link = htmlspecialchars($imgData['link'] ?? '#');
        if (! $img) {
            return '';
        }

        return <<<HTML
        <a href="{$link}" target="_blank" class="d-block position-relative group overflow-hidden bg-dark">
            <img src="{$img}" alt="Instagram" class="w-100 h-100 object-fit-cover opacity-100 group-hover:opacity-50 transition-all duration-300" style="aspect-ratio: 1/1; transition: transform 0.5s;">
            <div class="position-absolute top-50 start-50 translate-middle text-white opacity-0 group-hover:opacity-100 transition-all duration-300 z-2">
                <i class="lab la-instagram fs-1"></i>
            </div>
        </a>
HTML;
    }
}
