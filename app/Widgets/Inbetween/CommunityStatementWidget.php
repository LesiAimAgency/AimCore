<?php

namespace App\Widgets\Inbetween;

use App\Widgets\BaseWidget;

class CommunityStatementWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Community Statement',
            'description' => 'Hiển thị lời tuyên bố cộng đồng kèm 4 hình ảnh lưới',
            'category' => 'inbetween',
            'version' => '1.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" /></svg>',
            'fields' => [
                [
                    'name' => 'title_top',
                    'label' => 'Tiêu đề trên (The Community)',
                    'type' => 'text',
                    'default' => 'THE COMMUNITY'
                ],
                [
                    'name' => 'title_bot',
                    'label' => 'Tiêu đề dưới (Creating)',
                    'type' => 'text',
                    'default' => 'CREATING'
                ],
                [
                    'name' => 'description',
                    'label' => 'Mô tả',
                    'type' => 'textarea',
                    'default' => 'A cross-border network where Professionals, Founders and Creatives collaborate and connect.'
                ],
                [
                    'name' => 'image_1',
                    'label' => 'Hình 1 (Top Left)',
                    'type' => 'image',
                    'default' => ''
                ],
                [
                    'name' => 'image_2',
                    'label' => 'Hình 2 (Bottom Left)',
                    'type' => 'image',
                    'default' => ''
                ],
                [
                    'name' => 'image_3',
                    'label' => 'Hình 3 (Top Right)',
                    'type' => 'image',
                    'default' => ''
                ],
                [
                    'name' => 'image_4',
                    'label' => 'Hình 4 (Bottom Right)',
                    'type' => 'image',
                    'default' => ''
                ],
                [
                    'name' => 'btn_1_text',
                    'label' => 'Chữ nút 1',
                    'type' => 'text',
                    'default' => 'JOIN COMMUNITY'
                ],
                [
                    'name' => 'btn_1_link',
                    'label' => 'Link nút 1',
                    'type' => 'text',
                    'default' => '#packages'
                ],
                [
                    'name' => 'btn_2_text',
                    'label' => 'Chữ nút 2',
                    'type' => 'text',
                    'default' => 'UPCOMING EVENTS'
                ],
                [
                    'name' => 'btn_2_link',
                    'label' => 'Link nút 2',
                    'type' => 'text',
                    'default' => '#events'
                ]
            ]
        ];
    }

    public function render(): string
    {
        $settings = $this->settings;

        if (empty($settings['title_top'])) $settings['title_top'] = 'THE COMMUNITY';
        if (empty($settings['title_bot'])) $settings['title_bot'] = 'CREATING';
        if (empty($settings['description'])) $settings['description'] = 'A cross-border network where Professionals, Founders and Creatives collaborate and connect.';
        if (empty($settings['btn_1_text'])) $settings['btn_1_text'] = 'JOIN COMMUNITY';
        if (empty($settings['btn_1_link'])) $settings['btn_1_link'] = '#packages';
        if (empty($settings['btn_2_text'])) $settings['btn_2_text'] = 'UPCOMING EVENTS';
        if (empty($settings['btn_2_link'])) $settings['btn_2_link'] = '#events';

        for ($i = 1; $i <= 4; $i++) {
            if (empty($settings['image_' . $i])) {
                $settings['image_' . $i] = asset("themes/inbetween/assets/image{$i}_250_148.png");
            }
        }

        return view('widgets.inbetween.community_statement', ['widget' => $this, 'settings' => $settings])->render();
    }
}
