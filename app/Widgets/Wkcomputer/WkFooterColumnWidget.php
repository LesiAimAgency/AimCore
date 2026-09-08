<?php

namespace App\Widgets\Wkcomputer;

use App\Models\Menu;
use App\Widgets\BaseWidget;

class WkFooterColumnWidget extends BaseWidget
{
    public static function getConfig(): array
    {
        return [
            'name' => 'WK Footer Column',
            'description' => 'Cột thông tin trong chân trang (Menu, Giới thiệu, Liên hệ, Newsletter)',
            'category' => 'wkcomputer',
            'version' => '1.0.0',
            'fields' => [
                [
                    'name' => 'title',
                    'label' => 'Tiêu đề cột',
                    'type' => 'text',
                    'default' => 'Liên kết',
                ],
                [
                    'name' => 'type',
                    'label' => 'Kiểu cột',
                    'type' => 'select',
                    'options' => [
                        'contact' => 'Thông tin công ty / liên hệ',
                        'menu' => 'Danh sách menu / liên kết',
                        'newsletter' => 'Đăng ký nhận ưu đãi',
                        'custom' => 'Tùy chỉnh nội dung HTML',
                    ],
                    'default' => 'menu',
                ],
                [
                    'name' => 'menu_slug',
                    'label' => 'Slug của Menu (nếu kiểu menu)',
                    'type' => 'text',
                    'default' => '',
                ],
                [
                    'name' => 'content',
                    'label' => 'Nội dung tùy chỉnh (nếu kiểu tùy chỉnh)',
                    'type' => 'textarea',
                    'default' => '',
                ],
            ],
        ];
    }

    public function render(): string
    {
        $config = $this->settings;
        $projectId = $config['project_id']
            ?? (function_exists('current_project') && current_project() ? current_project()->id : 14);

        $type = $config['type'] ?? 'menu';
        $title = $config['title'] ?? '';
        $menuItems = collect();

        if ($type === 'menu' && ! empty($config['menu_slug'])) {
            $menu = Menu::where(function ($q) use ($projectId) {
                if ($projectId) {
                    $q->where('project_id', $projectId);
                }
            })->where('slug', $config['menu_slug'])->first();

            if ($menu && method_exists($menu, 'items')) {
                $menuItems = $menu->items()->whereNull('parent_id')->orderBy('sort_order')->get();
            }
        }

        return view('widgets.wkcomputer.footer_column', [
            'widget' => $this,
            'settings' => $config,
            'config' => $config,
            'title' => $title,
            'type' => $type,
            'menuItems' => $menuItems,
        ])->render();
    }
}
