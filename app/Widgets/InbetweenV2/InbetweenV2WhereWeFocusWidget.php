<?php

declare(strict_types=1);

namespace App\Widgets\InbetweenV2;

use App\Widgets\BaseWidget;

class InbetweenV2WhereWeFocusWidget extends BaseWidget
{
    public static string $label = 'Where We Focus Section';

    public static string $description = 'Section Where We Focus với 4 lĩnh vực trọng tâm: Industrial, Automation/Tech, Biotech/Healthcare, Energy/Sustainability';

    public static string $icon = 'squares-2x2';

    public static function getConfig(): array
    {
        return [
            'name' => 'Where We Focus Section',
            'description' => 'Section Where We Focus với 4 lĩnh vực trọng tâm: Industrial, Automation/Tech, Biotech/Healthcare, Energy/Sustainability',
            'category' => 'inbetween_v2',
            'version' => '2.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0 3.75v4.5m0 3.75h4.5m3.75 0h4.5m3.75 0h4.5m0-3.75v-4.5m0-3.75v-4.5m0-3.75h-4.5m-3.75 0h-4.5m-3.75 0h-4.5" /></svg>',
            'fields' => [
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
            ],
        ];
    }

    public function render(): string
    {
        $settings = array_merge([
            'heading_line1' => 'Our core business sectors',
            'heading_line2' => 'Where we create values',
        ], $this->settings);

        return view('widgets.inbetween_v2.where_we_focus', [
            'widget' => $this,
            'settings' => $settings,
        ])->render();
    }
}
