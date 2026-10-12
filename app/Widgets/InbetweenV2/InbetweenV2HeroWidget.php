<?php

declare(strict_types=1);

namespace App\Widgets\InbetweenV2;

use App\Widgets\BaseWidget;

class InbetweenV2HeroWidget extends BaseWidget
{
    public static string $label = 'Hero Section';

    public static string $description = 'Hero banner chính với radiant touch hands, headline, danh sách dịch vụ và CTA';

    public static string $icon = 'hero';

    public static function getConfig(): array
    {
        return [
            'name' => 'Hero Section',
            'description' => 'Hero banner chính với radiant touch hands, headline, danh sách dịch vụ và CTA',
            'category' => 'inbetween_v2',
            'version' => '2.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>',
            'fields' => [
                [
                    'name' => 'headline_text',
                    'label' => 'Hero Stage Headline Text',
                    'type' => 'text',
                    'default' => "YOUR LOCAL TEAM BEFORE YOU'RE READY TO HIRE ONE.",
                ],
                [
                    'name' => 'services',
                    'label' => 'Danh sách dịch vụ (nhập nhiều dịch vụ cách nhau bằng dấu phẩy)',
                    'type' => 'textarea',
                    'rows' => 3,
                    'default' => 'Sales & BD, Market Validation, Market Entry Execution, Local Business Support',
                    'placeholder' => 'Ví dụ: Sales & BD, Market Validation',
                    'description' => 'Nhập các dịch vụ hiển thị tại Hero Stage, phân cách nhau bằng dấu phẩy (,)',
                ],
                [
                    'name' => 'description',
                    'label' => 'Description (HTML allowed)',
                    'type' => 'ckeditor',
                    'rows' => 4,
                    'default' => 'We help <strong class="font-semibold text-white">Asian SMEs, founders and entrepreneurs</strong> enter and grow in Vietnam.',
                ],
                [
                    'name' => 'cta_text',
                    'label' => 'CTA Button Text',
                    'type' => 'text',
                    'default' => 'Talk to us',
                ],
                [
                    'name' => 'cta_link',
                    'label' => 'CTA Button Link',
                    'type' => 'text',
                    'default' => '#contact-modal',
                ],
                [
                    'name' => 'bg_type',
                    'label' => 'Loại Background Hero (Desktop & Mobile)',
                    'type' => 'select',
                    'options' => [
                        'video' => 'Video Background (MP4 / WebM)',
                        'image' => 'Hình ảnh Background (Image)',
                        'none' => 'Chỉ dùng màu nền (No media)',
                    ],
                    'default' => 'video',
                    'description' => 'Chọn hiển thị Video hoặc Hình ảnh làm background cho Hero Section',
                ],
                [
                    'name' => 'bg_video',
                    'label' => 'Video Background (Desktop & Chung)',
                    'type' => 'video',
                    'default' => 'themes/inbetween_v2/videos/section_video.mp4',
                    'placeholder' => 'Đường dẫn file video hoặc chọn từ thư viện',
                    'description' => 'Video nền tự động chạy loop muted (MP4 / WebM)',
                ],
                [
                    'name' => 'bg_image',
                    'label' => 'Hình ảnh Background (Desktop & Chung)',
                    'type' => 'image',
                    'default' => 'themes/inbetween_v2/images/hero-hands-glow.png',
                    'description' => 'Ảnh nền hiển thị (hoặc làm ảnh chờ poster khi phát video)',
                ],
                [
                    'name' => 'bg_video_mobile',
                    'label' => 'Video Background riêng cho Mobile (Tùy chọn)',
                    'type' => 'video',
                    'default' => '',
                    'placeholder' => 'Để trống sẽ dùng chung Video Background ở trên',
                    'description' => 'Video tối ưu riêng cho màn hình điện thoại (nếu có)',
                ],
                [
                    'name' => 'bg_image_mobile',
                    'label' => 'Hình ảnh Background riêng cho Mobile (Tùy chọn)',
                    'type' => 'image',
                    'default' => '',
                    'description' => 'Để trống sẽ dùng chung Hình ảnh Background ở trên',
                ],
                [
                    'name' => 'logo_white',
                    'label' => 'Header Logo White (Fallback)',
                    'type' => 'image',
                    'default' => 'themes/inbetween_v2/images/Logo-white.svg',
                ],
                [
                    'name' => 'logo_dark',
                    'label' => 'Header Logo Dark (Fallback)',
                    'type' => 'image',
                    'default' => 'themes/inbetween_v2/images/Logo.svg',
                ],
                [
                    'name' => 'connect_text',
                    'label' => "Header Let's Connect Text",
                    'type' => 'text',
                    'default' => "LET'S CONNECT",
                ],
                [
                    'name' => 'connect_link',
                    'label' => "Header Let's Connect Link",
                    'type' => 'text',
                    'default' => '#contact-modal',
                ],
            ],
        ];
    }

    public function getMergedSettings(): array
    {
        return array_merge([
            'bg_type' => 'video',
            'bg_video' => 'themes/inbetween_v2/videos/section_video.mp4',
            'bg_image' => 'themes/inbetween_v2/images/hero-hands-glow.png',
            'bg_video_mobile' => '',
            'bg_image_mobile' => '',
            'logo_white' => 'themes/inbetween_v2/images/Logo-white.svg',
            'logo_dark' => 'themes/inbetween_v2/images/Logo.svg',
            'lang_en_label' => 'EN',
            'lang_zh_label' => '汉语',
            'connect_text' => "LET'S CONNECT",
            'connect_link' => '#contact-modal',
            'headline_text' => "YOUR LOCAL TEAM BEFORE YOU'RE READY TO HIRE ONE.",
            'services' => 'Sales & BD, Market Validation, Market Entry Execution, Local Business Support',
            'description' => 'We help <strong class="font-semibold text-white">Asian SMEs, founders and entrepreneurs</strong> enter and grow in Vietnam.',
            'cta_text' => 'Talk to us',
            'cta_link' => '#contact-modal',
        ], $this->settings);
    }

    public function render(): string
    {
        $settings = $this->getMergedSettings();

        return view('widgets.inbetween_v2.hero', [
            'widget' => $this,
            'settings' => $settings,
        ])->render();
    }
}
