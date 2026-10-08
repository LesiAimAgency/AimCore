<?php

declare(strict_types=1);

namespace App\Widgets\InbetweenV2;

use App\Widgets\BaseWidget;

class InbetweenV2WhereWeFocusWidget extends BaseWidget
{
    public static string $label = 'Where We Focus Section';

    public static string $description = 'Section Where We Focus với các lĩnh vực trọng tâm lặp lại (Industrial, Automation/Tech, Biotech/Healthcare, Energy/Sustainability)';

    public static string $icon = 'squares-2x2';

    public static function getConfig(): array
    {
        return [
            'name' => 'Where We Focus Section',
            'description' => 'Section Where We Focus với các lĩnh vực trọng tâm lặp lại (Industrial, Automation/Tech, Biotech/Healthcare, Energy/Sustainability)',
            'category' => 'inbetween_v2',
            'version' => '2.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0 3.75v4.5m0 3.75h4.5m3.75 0h4.5m3.75 0h4.5m0-3.75v-4.5m0-3.75v-4.5m0-3.75h-4.5m-3.75 0h-4.5m-3.75 0h-4.5" /></svg>',
            'fields' => [
                [
                    'name' => 'badge_text',
                    'label' => 'Badge Subtitle',
                    'type' => 'text',
                    'default' => '[ WHERE WE FOCUS ]',
                ],
                [
                    'name' => 'heading_line1',
                    'label' => 'Heading Line 1 (Cam)',
                    'type' => 'text',
                    'default' => 'Our core business sectors',
                ],
                [
                    'name' => 'heading_line2',
                    'label' => 'Heading Line 2 (Đen)',
                    'type' => 'text',
                    'default' => 'Where we create values',
                ],
                [
                    'name' => 'sectors',
                    'label' => 'Danh sách lĩnh vực trọng tâm (Repeatable Sectors)',
                    'type' => 'repeatable',
                    'min_items' => 1,
                    'max_items' => 10,
                    'fields' => [
                        [
                            'name' => 'title_line1',
                            'label' => 'Tiêu đề dòng 1 (VD: INDUSTRIAL &)',
                            'type' => 'text',
                            'default' => 'INDUSTRIAL &',
                        ],
                        [
                            'name' => 'title_line2',
                            'label' => 'Tiêu đề dòng 2 (VD: MANUFACTURING)',
                            'type' => 'text',
                            'default' => 'MANUFACTURING',
                        ],
                        [
                            'name' => 'tags',
                            'label' => 'Danh sách thẻ Tags (cách nhau bởi dấu phẩy)',
                            'type' => 'textarea',
                            'default' => 'Machinery, Equipment, Components, Factory Solutions, Materials',
                        ],
                        [
                            'name' => 'image',
                            'label' => 'Hình ảnh minh hoạ',
                            'type' => 'image',
                            'default' => 'themes/inbetween_v2/images/sector-robot-arm.png',
                        ],
                    ],
                ],
            ],
        ];
    }

    public function render(): string
    {
        $settings = array_merge([
            'badge_text' => '[ WHERE WE FOCUS ]',
            'heading_line1' => 'Our core business sectors',
            'heading_line2' => 'Where we create values',
            'sectors' => [
                [
                    'title_line1' => 'INDUSTRIAL &',
                    'title_line2' => 'MANUFACTURING',
                    'tags' => 'Machinery, Equipment, Components, Factory Solutions, Materials',
                    'image' => 'themes/inbetween_v2/images/sector-robot-arm.png',
                ],
                [
                    'title_line1' => 'ELECTRONICS, AUTOMATION',
                    'title_line2' => '& TECHNOLOGY',
                    'tags' => 'Testing & Inspection, Electronics, Industrial Technology, Automation, Digital Solutions',
                    'image' => 'themes/inbetween_v2/images/sector-chipset-ai.png',
                ],
                [
                    'title_line1' => 'BIOTECHNOLOGY &',
                    'title_line2' => 'HEALTHCARE',
                    'tags' => 'Healthcare solutions, Biotech, Medical Technology, Pharma, Laboratory, Diagnostics',
                    'image' => 'themes/inbetween_v2/images/sector-dna-helix.png',
                ],
                [
                    'title_line1' => 'ENERGY, ENVIRONMENT',
                    'title_line2' => '& SUSTAINABILITY',
                    'tags' => 'Sustainability Technology, Energy Technology, Environmental Solutions, Water & Waste, Renewable Energy, Materials',
                    'image' => 'themes/inbetween_v2/images/sector-lightning-bolt.png',
                ],
            ],
        ], $this->settings);

        return view('widgets.inbetween_v2.where_we_focus', [
            'widget' => $this,
            'settings' => $settings,
        ])->render();
    }
}
