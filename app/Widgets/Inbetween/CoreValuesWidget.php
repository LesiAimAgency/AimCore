<?php

namespace App\Widgets\Inbetween;

use App\Widgets\BaseWidget;

class CoreValuesWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Core Values & Partners',
            'description' => 'Hiển thị các giá trị cốt lõi và danh sách đối tác chạy ngang',
            'category' => 'inbetween',
            'version' => '1.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" /></svg>',
            'fields' => [
                [
                    'name' => 'title',
                    'label' => 'Tiêu đề (Core Values)',
                    'type' => 'text',
                    'default' => 'CORE VALUES'
                ],
                [
                    'name' => 'subtitle',
                    'label' => 'Tiêu đề phụ',
                    'type' => 'text',
                    'default' => 'Who we are inspire what we do'
                ],
                [
                    'name' => 'val_1_title', 'label' => 'Giá trị 1 - Tiêu đề', 'type' => 'text', 'default' => 'AUTHENTICITY'
                ],
                [
                    'name' => 'val_1_desc', 'label' => 'Giá trị 1 - Mô tả', 'type' => 'textarea', 'default' => 'Building genuine bonds across diverse cultures and creative industries'
                ],
                [
                    'name' => 'val_2_title', 'label' => 'Giá trị 2 - Tiêu đề', 'type' => 'text', 'default' => 'INNOVATION'
                ],
                [
                    'name' => 'val_2_desc', 'label' => 'Giá trị 2 - Mô tả', 'type' => 'textarea', 'default' => 'Empowering bold ideas and fostering cross-border breakthroughs'
                ],
                [
                    'name' => 'val_3_title', 'label' => 'Giá trị 3 - Tiêu đề', 'type' => 'text', 'default' => 'IMPACT'
                ],
                [
                    'name' => 'val_3_desc', 'label' => 'Giá trị 3 - Mô tả', 'type' => 'textarea', 'default' => 'Creating lasting value and sustainable growth for our global community'
                ],
                [
                    'name' => 'partners_title',
                    'label' => 'Tiêu đề Partners',
                    'type' => 'text',
                    'default' => 'TRUSTED BY GLOBAL TEAMS'
                ],
                [
                    'name' => 'partners',
                    'label' => 'Danh sách logo đối tác (Partners)',
                    'type' => 'repeatable',
                    'fields' => [
                        [
                            'name' => 'image',
                            'label' => 'Hình ảnh logo',
                            'type' => 'image'
                        ]
                    ]
                ]
            ]
        ];
    }

    public function render(): string
    {
        $settings = $this->settings;

        if (empty($settings['title'])) $settings['title'] = 'CORE VALUES';
        if (empty($settings['subtitle'])) $settings['subtitle'] = 'Who we are inspire what we do';
        
        if (empty($settings['val_1_title'])) $settings['val_1_title'] = 'AUTHENTICITY';
        if (empty($settings['val_1_desc'])) $settings['val_1_desc'] = 'Building genuine bonds across diverse cultures and creative industries';
        if (empty($settings['val_2_title'])) $settings['val_2_title'] = 'INNOVATION';
        if (empty($settings['val_2_desc'])) $settings['val_2_desc'] = 'Empowering bold ideas and fostering cross-border breakthroughs';
        if (empty($settings['val_3_title'])) $settings['val_3_title'] = 'IMPACT';
        if (empty($settings['val_3_desc'])) $settings['val_3_desc'] = 'Creating lasting value and sustainable growth for our global community';
        
        if (empty($settings['partners_title'])) $settings['partners_title'] = 'OUR BUSINESS PARTNERS';

        return view('widgets.inbetween.core_values', ['widget' => $this, 'settings' => $settings])->render();
    }
}
