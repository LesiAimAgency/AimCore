<?php

declare(strict_types=1);

namespace App\Widgets\InbetweenV2;

use App\Widgets\BaseWidget;

class InbetweenV2FooterWidget extends BaseWidget
{
    public static string $label = 'Footer Section';

    public static string $description = 'Section Footer của INBETWEEN với More Connections text đổi 1s hiệu ứng trên xuống, Form liên hệ tư vấn và Sub-footer';

    public static string $icon = 'sparkles';

    public static function getConfig(): array
    {
        return [
            'name' => 'Footer Section',
            'description' => 'Section Footer của INBETWEEN với More Connections text đổi 1s hiệu ứng trên xuống, Form liên hệ tư vấn và Sub-footer',
            'category' => 'inbetween_v2',
            'version' => '2.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>',
            'fields' => [
                [
                    'name' => 'logo_white',
                    'label' => 'Logo White SVG/Image',
                    'type' => 'image',
                    'default' => '/storage/media/project-DA005/Logo-white.svg',
                ],
                [
                    'name' => 'lang_en_label',
                    'label' => 'Language 1 Label',
                    'type' => 'text',
                    'default' => 'EN',
                ],
                [
                    'name' => 'lang_zh_label',
                    'label' => 'Language 2 Label',
                    'type' => 'text',
                    'default' => '汉语',
                ],
                [
                    'name' => 'top_connect_text',
                    'label' => 'Top Connect Button Text',
                    'type' => 'text',
                    'default' => "LET'S CONNECT",
                ],
                [
                    'name' => 'top_connect_link',
                    'label' => 'Top Connect Button Link',
                    'type' => 'text',
                    'default' => '#contact-modal',
                ],
                [
                    'name' => 'heading_prefix',
                    'label' => 'Heading Prefix (Trắng)',
                    'type' => 'text',
                    'default' => 'MORE',
                ],
                [
                    'name' => 'rotating_words',
                    'label' => 'Danh sách text đổi mỗi 1s hiệu ứng trên xuống',
                    'type' => 'repeatable',
                    'min_items' => 1,
                    'max_items' => 10,
                    'fields' => [
                        [
                            'name' => 'text',
                            'label' => 'Từ hiển thị (VD: CONNECTIONS)',
                            'type' => 'text',
                            'default' => 'CONNECTIONS',
                        ],
                    ],
                ],
                [
                    'name' => 'form_title_line1',
                    'label' => 'Form Title Line 1 (Trắng)',
                    'type' => 'text',
                    'default' => 'READY TO BUILD',
                ],
                [
                    'name' => 'form_title_highlight',
                    'label' => 'Form Title Highlight (Cam)',
                    'type' => 'text',
                    'default' => 'SOMETHING BOLD',
                ],
                [
                    'name' => 'form_title_line2',
                    'label' => 'Form Title Line 2 (Trắng)',
                    'type' => 'text',
                    'default' => 'IN VIETNAM?',
                ],
                [
                    'name' => 'form_privacy_text',
                    'label' => 'Nội dung điều khoản Chính sách',
                    'type' => 'text',
                    'default' => 'I have read and agree to the Data & Privacy Policy of in • between',
                ],
                [
                    'name' => 'form_newsletter_text',
                    'label' => 'Nội dung đăng ký nhận tin',
                    'type' => 'text',
                    'default' => 'Send me regular business updates and market insights',
                ],
                [
                    'name' => 'contact_phone',
                    'label' => 'Số điện thoại liên hệ (P:)',
                    'type' => 'text',
                    'default' => '0909 999 999',
                ],
                [
                    'name' => 'contact_email',
                    'label' => 'Email liên hệ (E:)',
                    'type' => 'text',
                    'default' => 'inbetween.asia@gmail.com',
                ],
                [
                    'name' => 'community_title',
                    'label' => 'Tiêu đề nhóm/Cộng đồng (Cột mới kế bên Explore)',
                    'type' => 'text',
                    'default' => 'Join the NOPA Zalo group',
                ],
                [
                    'name' => 'community_desc',
                    'label' => 'Mô tả nhóm/Cộng đồng (Cột mới)',
                    'type' => 'textarea',
                    'default' => "Next Day Club, new perks, and what's happening around Saigon.",
                ],
                [
                    'name' => 'community_link_text',
                    'label' => 'Chữ nút link nhóm/Cộng đồng (Cột mới)',
                    'type' => 'text',
                    'default' => 'Join the group',
                ],
                [
                    'name' => 'community_link_url',
                    'label' => 'Đường dẫn link nhóm/Cộng đồng (Có thể link ngoài https://...)',
                    'type' => 'text',
                    'default' => '#',
                ],
                [
                    'name' => 'facebook_url',
                    'label' => 'Đường dẫn Facebook',
                    'type' => 'text',
                    'default' => 'https://facebook.com',
                ],
                [
                    'name' => 'instagram_url',
                    'label' => 'Đường dẫn Instagram',
                    'type' => 'text',
                    'default' => 'https://instagram.com',
                ],
                [
                    'name' => 'linkedin_url',
                    'label' => 'Đường dẫn LinkedIn',
                    'type' => 'text',
                    'default' => 'https://linkedin.com',
                ],
                [
                    'name' => 'tiktok_url',
                    'label' => 'Đường dẫn TikTok',
                    'type' => 'text',
                    'default' => 'https://tiktok.com',
                ],
                [
                    'name' => 'copyright_text',
                    'label' => 'Copyright Text',
                    'type' => 'text',
                    'default' => 'Copyright belong to INBETWEEN',
                ],
                [
                    'name' => 'powered_by_text',
                    'label' => 'Powered By Text',
                    'type' => 'text',
                    'default' => 'Powered by AIM AGENCY',
                ],
            ],
        ];
    }

    public function render(): string
    {
        return view('widgets.inbetween_v2.footer', [
            'widget' => $this->model,
            'settings' => $this->settings,
        ])->render();
    }
}
