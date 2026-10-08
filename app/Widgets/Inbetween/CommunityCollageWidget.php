<?php

namespace App\Widgets\Inbetween;

use App\Widgets\BaseWidget;

class CommunityCollageWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Community 3D Collage',
            'description' => 'Hiển thị hiệu ứng 3D Collage các hình ảnh của cộng đồng',
            'category' => 'inbetween',
            'version' => '1.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" /></svg>',
            'fields' => [
                [
                    'name' => 'center_logo',
                    'label' => 'Center Logo Image',
                    'type' => 'image',
                    'default' => '',
                ],
                [
                    'name' => 'image_1', 'label' => 'Image 1 (Community)', 'type' => 'image', 'default' => '',
                ],
                [
                    'name' => 'image_2', 'label' => 'Image 2 (Founder)', 'type' => 'image', 'default' => '',
                ],
                [
                    'name' => 'image_3', 'label' => 'Image 3 (Member)', 'type' => 'image', 'default' => '',
                ],
                [
                    'name' => 'image_4', 'label' => 'Image 4 (Speaker)', 'type' => 'image', 'default' => '',
                ],
                [
                    'name' => 'image_5', 'label' => 'Image 5 (Event)', 'type' => 'image', 'default' => '',
                ],
                [
                    'name' => 'image_6', 'label' => 'Image 6 (Interview)', 'type' => 'image', 'default' => '',
                ],
                [
                    'name' => 'image_7', 'label' => 'Image 7 (Summit)', 'type' => 'image', 'default' => '',
                ],
                [
                    'name' => 'image_8', 'label' => 'Image 8 (Media)', 'type' => 'image', 'default' => '',
                ],
                [
                    'name' => 'image_9', 'label' => 'Image 9 (Podcast)', 'type' => 'image', 'default' => '',
                ],
                [
                    'name' => 'image_10', 'label' => 'Image 10 (Innovator)', 'type' => 'image', 'default' => '',
                ],
            ],
        ];
    }

    public function render(): string
    {
        $settings = $this->settings;

        if (empty($settings['center_logo'])) {
            $settings['center_logo'] = asset('themes/inbetween/assets/logo-white.svg');
        }
        for ($i = 1; $i <= 10; $i++) {
            if (empty($settings['image_'.$i])) {
                $idx = $i - 1;
                $settings['image_'.$i] = asset("themes/inbetween/assets/image{$idx}_252_132.png");
            }
        }

        return view('widgets.inbetween.community_collage', ['widget' => $this, 'settings' => $settings])->render();
    }
}
