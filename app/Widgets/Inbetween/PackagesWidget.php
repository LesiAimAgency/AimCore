<?php

namespace App\Widgets\Inbetween;

use App\Widgets\BaseWidget;

class PackagesWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'Packages',
            'description' => 'Hiển thị các gói đăng ký tham gia cộng đồng',
            'category' => 'inbetween',
            'version' => '1.0.0',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z" /></svg>',
            'fields' => [
                [
                    'name' => 'title',
                    'label' => 'Tiêu đề',
                    'type' => 'textarea',
                    'default' => 'Be a member of<br><span class="text-[#EC460B]">Our Community</span>',
                ],
                [
                    'name' => 'subtitle',
                    'label' => 'Đoạn mô tả ngắn (Description)',
                    'type' => 'textarea',
                    'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since 1966.',
                ],
                [
                    'name' => 'btn_text',
                    'label' => 'Chữ nút (Mặc định cho các gói)',
                    'type' => 'text',
                    'default' => 'BECOME A MEMBER',
                ],
                [
                    'name' => 'btn_link',
                    'label' => 'Link nút',
                    'type' => 'text',
                    'default' => '#contact',
                ],
                [
                    'name' => 'packages_list',
                    'label' => 'Danh sách gói',
                    'type' => 'repeatable',
                    'fields' => [
                        [
                            'name' => 'name',
                            'label' => 'Tên gói',
                            'type' => 'text',
                            'default' => 'PACKAGE 1',
                        ],
                        [
                            'name' => 'price',
                            'label' => 'Giá',
                            'type' => 'text',
                            'default' => '$29',
                        ],
                        [
                            'name' => 'period',
                            'label' => 'Đơn vị tính (VD: / Month)',
                            'type' => 'text',
                            'default' => '/ Month',
                        ],
                        [
                            'name' => 'description',
                            'label' => 'Mô tả ngắn (Privilege)',
                            'type' => 'textarea',
                            'default' => 'Privilege',
                        ],
                        [
                            'name' => 'features',
                            'label' => 'Tính năng (Mỗi dòng 1 tính năng)',
                            'type' => 'textarea',
                            'default' => "Lorem Ipsum is simply dummy text of the printing\nLorem Ipsum is simply dummy text of the printing\nLorem Ipsum is simply dummy text of the printing",
                        ],
                        [
                            'name' => 'highlight',
                            'label' => 'Nổi bật (Hiệu ứng viền cam)',
                            'type' => 'select',
                            'options' => [
                                '0' => 'Không',
                                '1' => 'Có',
                            ],
                            'default' => '0',
                        ],
                    ],
                    'default' => [
                        [
                            'name' => 'PACKAGE 1',
                            'price' => '$29',
                            'period' => '/ Month',
                            'description' => 'Privilege',
                            'features' => "Lorem Ipsum is simply dummy text of the printing\nLorem Ipsum is simply dummy text of the printing\nLorem Ipsum is simply dummy text of the printing",
                            'highlight' => '0',
                        ],
                        [
                            'name' => 'PACKAGE 2',
                            'price' => '$49',
                            'period' => '/ Month',
                            'description' => 'Privilege',
                            'features' => "Lorem Ipsum is simply dummy text of the printing\nLorem Ipsum is simply dummy text of the printing\nLorem Ipsum is simply dummy text of the printing",
                            'highlight' => '0',
                        ],
                        [
                            'name' => 'PACKAGE 3',
                            'price' => '$69',
                            'period' => '/ Month',
                            'description' => 'Privilege',
                            'features' => "Lorem Ipsum is simply dummy text of the printing\nLorem Ipsum is simply dummy text of the printing\nLorem Ipsum is simply dummy text of the printing",
                            'highlight' => '0',
                        ],
                    ],
                ],
            ],
        ];
    }

    public function render(): string
    {
        $settings = $this->settings;

        if (empty($settings['title'])) {
            $settings['title'] = 'Be a member of<br><span class="text-[#EC460B]">Our Community</span>';
        }
        if (empty($settings['subtitle'])) {
            $settings['subtitle'] = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since 1966.';
        }
        if (empty($settings['btn_text'])) {
            $settings['btn_text'] = 'BECOME A MEMBER';
        }
        if (empty($settings['btn_link'])) {
            $settings['btn_link'] = '#contact';
        }

        return view('widgets.inbetween.packages', ['widget' => $this, 'settings' => $settings])->render();
    }
}
