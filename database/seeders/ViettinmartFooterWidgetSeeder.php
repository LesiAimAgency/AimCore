<?php

namespace Database\Seeders;

use App\Models\Widget;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ViettinmartFooterWidgetSeeder extends Seeder
{
    /**
     * Chạy seeder chỉ cho khu vực Footer.
     */
    public function run(?int $projectId = null, ?int $tenantId = null): void
    {
        if (! $projectId) {
            $project = Project::where('code', 'viettinmart-eco')->orWhere('code', 'viettinmart')->first();
            $projectId = $project ? $project->id : 10;
        }
        $tenantId = $tenantId ?? $projectId;

        // Xóa widget footer cũ của project
        Widget::where('project_id', $projectId)->where('area', 'footer')->delete();

        $widgets = [
            // Cột 1: Thông tin công ty (col-lg-3)
            [
                'name' => 'Footer — Thông tin công ty',
                'type' => 'footer_column',
                'area' => 'footer',
                'sort_order' => 1,
                'is_active' => true,
                'settings' => [
                    'title' => 'Về chúng tôi',
                    'type' => 'contact',
                    'col_class' => 'col-lg-3 col-md-6 col-sm-12 col-12 single-footer-wized',
                    'title_class' => 'footer-title animated fadeIn',
                ],
            ],

            // Cột 2: Liên kết nhanh (col-lg-2)
            [
                'name' => 'Footer — Liên kết nhanh',
                'type' => 'footer_column',
                'area' => 'footer',
                'sort_order' => 2,
                'is_active' => true,
                'settings' => [
                    'title' => 'Liên kết nhanh',
                    'type' => 'menu',
                    'menu_slug' => 'footer-quick-links',
                    'col_class' => 'col-lg-2 col-md-6 col-sm-12 col-12 single-footer-wized',
                    'title_class' => 'footer-title animated fadeIn',
                ],
            ],

            // Cột 3: Danh mục (col-lg-2)
            [
                'name' => 'Footer — Danh mục',
                'type' => 'footer_column',
                'area' => 'footer',
                'sort_order' => 3,
                'is_active' => true,
                'settings' => [
                    'title' => 'Danh mục',
                    'type' => 'menu',
                    'menu_slug' => 'footer-categories',
                    'col_class' => 'col-lg-2 col-md-6 col-sm-12 col-12 single-footer-wized',
                    'title_class' => 'footer-title animated fadeIn',
                ],
            ],

            // Cột 4: Chăm sóc khách hàng (col-lg-2)
            [
                'name' => 'Footer — Chăm sóc khách hàng',
                'type' => 'footer_column',
                'area' => 'footer',
                'sort_order' => 4,
                'is_active' => true,
                'settings' => [
                    'title' => 'Chăm sóc khách hàng',
                    'type' => 'menu',
                    'menu_slug' => 'footer-customer-service',
                    'col_class' => 'col-lg-2 col-md-6 col-sm-12 col-12 single-footer-wized',
                    'title_class' => 'footer-title animated fadeIn',
                ],
            ],

            // Cột 5: Đăng ký nhận tin (col-lg-3)
            [
                'name' => 'Footer — Đăng ký nhận tin',
                'type' => 'footer_column',
                'area' => 'footer',
                'sort_order' => 5,
                'is_active' => true,
                'settings' => [
                    'title' => 'Đăng ký nhận tin',
                    'type' => 'newsletter',
                    'newsletter_desc' => 'Đăng ký để nhận thông tin về sản phẩm mới và ưu đãi đặc biệt từ chúng tôi.',
                    'newsletter_note' => 'Tôi muốn nhận tin tức và ưu đãi',
                    'placeholder' => 'Nhập địa chỉ email của bạn',
                    'btn_text' => 'Đăng ký',
                    'col_class' => 'col-lg-3 col-md-6 col-sm-12 col-12 single-footer-wized',
                    'title_class' => 'footer-title animated fadeIn',
                ],
            ],
        ];

        foreach ($widgets as $data) {
            Widget::create([
                'widget_code' => 'widget_'.Str::random(8),
                'project_id' => $projectId,
                'tenant_id' => $tenantId,
                'name' => $data['name'],
                'type' => $data['type'],
                'area' => $data['area'],
                'sort_order' => $data['sort_order'],
                'is_active' => $data['is_active'],
                'settings' => $data['settings'],
            ]);
        }
    }
}
