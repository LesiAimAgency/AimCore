<?php

namespace App\Widgets\Viettinmart;

use App\Widgets\BaseWidget;

class ViettinmartFormWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Viettinmart Form',
            'description' => 'Display a dynamic contact or newsletter form',
            'category' => 'viettinmart',
            'version' => '1.0.0',
            'fields' => [
                [
                    'name' => 'title',
                    'label' => 'Tiêu đề Form',
                    'type' => 'text',
                    'default' => 'Đăng ký nhận tin',
                ],
                [
                    'name' => 'form_style',
                    'label' => 'Kiểu Form',
                    'type' => 'select',
                    'options' => [
                        'default' => 'Mặc định',
                        'inline' => 'Nằm ngang (Inline)',
                        'compact' => 'Thu gọn (Compact)',
                        'card' => 'Dạng Card',
                        'ekomart' => 'Ekomart Newsletter',
                    ],
                    'default' => 'ekomart',
                ],
                [
                    'name' => 'button_text',
                    'label' => 'Text trên nút bấm',
                    'type' => 'text',
                    'default' => 'Đăng ký ngay',
                ],
            ],
        ];
    }

    public function render(): string
    {
        $config = $this->settings;

        // Default newsletter form template
        $formTemplate = (object) [
            'id' => 1,
            'name' => 'Đăng Ký Nhận Tin',
            'fields' => [
                [
                    'name' => 'email',
                    'type' => 'email',
                    'label' => 'Email',
                    'placeholder' => 'Nhập email của bạn...',
                    'required' => true,
                ],
            ],
        ];

        return view('widgets.inbetween.viettinmart_form', [
            'widget' => $this,
            'settings' => $config,
            'config' => $config,
            'formTemplate' => $formTemplate,
            'sectionStyles' => $this->buildWrapperStyleAttribute(),
        ])->render();
    }
}
