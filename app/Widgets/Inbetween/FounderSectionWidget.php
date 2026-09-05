<?php

namespace App\Widgets\Inbetween;

use App\Widgets\BaseWidget;

class FounderSectionWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Founder Section',
            'description' => 'Hiển thị thông tin Founder, Social Badges và Mission',
            'category' => 'inbetween',
            'version' => '1.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" /></svg>',
            'fields' => [
                [
                    'name' => 'founder_name',
                    'label' => 'Tên Founder',
                    'type' => 'text',
                    'default' => 'HUYNH THI AI NHU',
                ],
                [
                    'name' => 'founder_role',
                    'label' => 'Vai trò',
                    'type' => 'text',
                    'default' => 'Founder of INBETWEEN',
                ],
                [
                    'name' => 'background_image',
                    'label' => 'Hình Nền Founder',
                    'type' => 'image',
                    'default' => '',
                ],
                [
                    'name' => 'social_1_text',
                    'label' => 'Mô tả Social 1 (YouTube)',
                    'type' => 'textarea',
                    'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                ],
                [
                    'name' => 'social_2_text',
                    'label' => 'Mô tả Social 2 (Facebook)',
                    'type' => 'textarea',
                    'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                ],
                [
                    'name' => 'social_3_text',
                    'label' => 'Mô tả Social 3 (Instagram)',
                    'type' => 'textarea',
                    'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                ],
                [
                    'name' => 'mission_statement',
                    'label' => 'Tuyên ngôn Sứ mệnh (Mission)',
                    'type' => 'textarea',
                    'default' => 'CONNECTING PEOPLE IS OUR VERY MISSION',
                ],
            ],
        ];
    }

    public function render(): string
    {
        $settings = $this->settings;

        if (empty($settings['founder_name'])) {
            $settings['founder_name'] = 'HUYNH THI AI NHU';
        }
        if (empty($settings['founder_role'])) {
            $settings['founder_role'] = 'Founder of INBETWEEN';
        }
        if (empty($settings['mission_statement'])) {
            $settings['mission_statement'] = 'CONNECTING PEOPLE IS OUR VERY MISSION';
        }

        for ($i = 1; $i <= 3; $i++) {
            if (empty($settings['social_'.$i.'_text'])) {
                $settings['social_'.$i.'_text'] = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
            }
        }

        if (empty($settings['background_image'])) {
            $settings['background_image'] = asset('themes/inbetween/assets/founder-bg.png');
        } else {
            $settings['background_image'] = asset($settings['background_image']);
        }

        return view('widgets.inbetween.founder_section', ['widget' => $this, 'settings' => $settings])->render();
    }
}
