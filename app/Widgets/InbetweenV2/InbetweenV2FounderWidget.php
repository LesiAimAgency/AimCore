<?php

declare(strict_types=1);

namespace App\Widgets\InbetweenV2;

use App\Widgets\BaseWidget;

class InbetweenV2FounderWidget extends BaseWidget
{
    public static string $label = 'Founder Profile Section';

    public static string $description = 'Section Founder với portrait, counter 14+ years, và drawer chi tiết mở rộng GSAP Flip';

    public static string $icon = 'user';

    public static function getConfig(): array
    {
        return [
            'name' => 'Founder Profile Section',
            'description' => 'Section Founder với portrait, counter 14+ years, và drawer chi tiết mở rộng GSAP Flip',
            'category' => 'inbetween_v2',
            'version' => '2.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>',
            'fields' => [
                [
                    'name' => 'founder_name',
                    'label' => 'Founder Name',
                    'type' => 'text',
                    'default' => 'AIRU',
                ],
                [
                    'name' => 'founder_role',
                    'label' => 'Founder Role',
                    'type' => 'text',
                    'default' => 'Founder of INBETWEEN',
                ],
                [
                    'name' => 'experience_years',
                    'label' => 'Số năm kinh nghiệm',
                    'type' => 'text',
                    'default' => '14+',
                ],
                [
                    'name' => 'quote_line1',
                    'label' => 'Quote Line 1 (Đen)',
                    'type' => 'text',
                    'default' => 'Built between cultures.',
                ],
                [
                    'name' => 'quote_line2',
                    'label' => 'Quote Line 2 (Cam)',
                    'type' => 'text',
                    'default' => 'Connected across borders.',
                ],
            ],
        ];
    }

    public function render(): string
    {
        $settings = array_merge([
            'founder_name' => 'AIRU',
            'founder_role' => 'Founder of INBETWEEN',
            'experience_years' => '14+',
            'quote_line1' => 'Built between cultures.',
            'quote_line2' => 'Connected across borders.',
        ], $this->settings);

        return view('widgets.inbetween_v2.founder', [
            'widget' => $this,
            'settings' => $settings,
        ])->render();
    }
}
