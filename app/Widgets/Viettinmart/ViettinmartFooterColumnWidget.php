<?php

namespace App\Widgets\Viettinmart;

use App\Widgets\BaseWidget;

class ViettinmartFooterColumnWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Viettinmart Footer Column',
            'description' => 'Hiển thị các cột thông tin, menu hoặc bản tin ở chân trang',
            'category' => 'viettinmart',
            'version' => '1.0.0',
            'fields' => [
                ['name' => 'title', 'label' => 'Tiêu đề cột', 'type' => 'text'],
                [
                    'name' => 'type',
                    'label' => 'Loại nội dung',
                    'type' => 'select',
                    'options' => [
                        'contact' => 'Thông tin liên hệ & giờ mở cửa',
                        'menu' => 'Menu liên kết',
                        'newsletter' => 'Đăng ký bản tin',
                        'html' => 'HTML tùy chỉnh',
                    ],
                    'default' => 'menu',
                ],
                ['name' => 'phone', 'label' => 'Số điện thoại 1', 'type' => 'text'],
                ['name' => 'phone_2', 'label' => 'Số điện thoại 2', 'type' => 'text'],
                ['name' => 'email', 'label' => 'Email 1', 'type' => 'text'],
                ['name' => 'email_2', 'label' => 'Email 2', 'type' => 'text'],
                ['name' => 'phone_label', 'label' => 'Nhãn hotline', 'type' => 'text', 'default' => 'Have Question? Call Us 24/7'],
                ['name' => 'hours', 'label' => 'Giờ làm việc', 'type' => 'textarea'],
                [
                    'name' => 'menu_slug',
                    'label' => 'Chọn Menu',
                    'type' => 'select',
                    'options' => [
                        'footer-quick-links' => 'Liên kết nhanh (footer-quick-links)',
                        'footer-categories' => 'Danh mục sản phẩm (footer-categories)',
                        'footer-customer-service' => 'Chăm sóc khách hàng (footer-customer-service)',
                        'footer-info' => 'Về công ty (footer-info)',
                        'footer-stores' => 'Cửa hàng (footer-stores)',
                        'footer-links' => 'Liên kết hữu ích (footer-links)',
                    ],
                ],
                ['name' => 'custom_menu_slug', 'label' => 'Hoặc nhập Slug Menu tùy chỉnh', 'type' => 'text'],
                ['name' => 'show_sitemap', 'label' => 'Hiển thị Sitemap', 'type' => 'boolean', 'default' => false],
                ['name' => 'newsletter_desc', 'label' => 'Mô tả ngắn bản tin', 'type' => 'textarea'],
                ['name' => 'newsletter_note', 'label' => 'Ghi chú dưới nút', 'type' => 'text'],
                ['name' => 'placeholder', 'label' => 'Placeholder Email', 'type' => 'text', 'default' => 'Nhập địa chỉ email của bạn'],
                ['name' => 'btn_text', 'label' => 'Chữ trên nút', 'type' => 'text', 'default' => 'Đăng ký'],
                ['name' => 'col_class', 'label' => 'CSS Class cho cột', 'type' => 'text', 'default' => 'col-lg-3 col-md-6 col-sm-12 col-12 single-footer-wized'],
                ['name' => 'title_class', 'label' => 'CSS Class cho tiêu đề', 'type' => 'text', 'default' => 'footer-title animated fadeIn'],
                ['name' => 'html_content', 'label' => 'Nội dung HTML (khi chọn loại HTML)', 'type' => 'textarea'],
            ],
        ];
    }

    public function render(): string
    {
        $viewName = view()->exists('frontend.themes.viettinmartdemo.widgets.types.footer_column')
            ? 'frontend.themes.viettinmartdemo.widgets.types.footer_column'
            : (view()->exists('widgets.types.footer_column') ? 'widgets.types.footer_column' : null);

        if (! $viewName) {
            return '';
        }

        return view($viewName, [
            'config' => $this->settings,
            'widget' => $this,
            'type' => $this->settings['type'] ?? 'menu',
        ])->render();
    }
}
