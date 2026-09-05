<?php

namespace Database\Seeders;

use App\Models\FormTemplate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ViettinmartFormTemplateSeeder extends Seeder
{
    public function run(int $projectId = 10, int $tenantId = 3): void
    {
        if (! Schema::hasTable('form_templates')) {
            return;
        }

        $templates = [
            // 1. Contact Form Template
            [
                'name' => 'Contact Form',
                'description' => 'Form liên hệ cơ bản với thông tin khách hàng',
                'fields' => [
                    [
                        'name' => 'name',
                        'label' => 'Họ và tên',
                        'type' => 'text',
                        'width' => '6',
                        'placeholder' => 'Nhập họ và tên của bạn',
                        'required' => true,
                    ],
                    [
                        'name' => 'email',
                        'label' => 'Email',
                        'type' => 'email',
                        'width' => '6',
                        'placeholder' => 'example@email.com',
                        'required' => true,
                    ],
                    [
                        'name' => 'phone',
                        'label' => 'Số điện thoại',
                        'type' => 'tel',
                        'width' => '6',
                        'placeholder' => '0123456789',
                        'required' => false,
                    ],
                    [
                        'name' => 'subject',
                        'label' => 'Chủ đề',
                        'type' => 'select',
                        'width' => '6',
                        'placeholder' => 'Chọn chủ đề',
                        'required' => true,
                        'options' => [
                            ['value' => 'general', 'label' => 'Thông tin chung'],
                            ['value' => 'support', 'label' => 'Hỗ trợ kỹ thuật'],
                            ['value' => 'sales', 'label' => 'Tư vấn bán hàng'],
                            ['value' => 'complaint', 'label' => 'Khiếu nại'],
                        ],
                    ],
                    [
                        'name' => 'message',
                        'label' => 'Nội dung tin nhắn',
                        'type' => 'textarea',
                        'width' => '12',
                        'placeholder' => 'Nhập nội dung tin nhắn của bạn...',
                        'required' => true,
                    ],
                ],
                'is_active' => true,
            ],

            // 2. Newsletter Subscription
            [
                'name' => 'Newsletter Subscription',
                'description' => 'Form đăng ký nhận tin tức và khuyến mãi',
                'fields' => [
                    [
                        'name' => 'email',
                        'label' => 'Email của bạn',
                        'type' => 'email',
                        'width' => '12',
                        'placeholder' => 'Nhập email để nhận tin tức mới nhất',
                        'required' => true,
                    ],
                    [
                        'name' => 'name',
                        'label' => 'Tên của bạn',
                        'type' => 'text',
                        'width' => '12',
                        'placeholder' => 'Tên để chúng tôi gọi bạn',
                        'required' => false,
                    ],
                    [
                        'name' => 'interests',
                        'label' => 'Quan tâm đến',
                        'type' => 'select',
                        'width' => '12',
                        'placeholder' => 'Chọn lĩnh vực quan tâm',
                        'required' => false,
                        'options' => [
                            ['value' => 'fashion', 'label' => 'Thời trang'],
                            ['value' => 'electronics', 'label' => 'Điện tử'],
                            ['value' => 'home', 'label' => 'Gia dụng'],
                            ['value' => 'beauty', 'label' => 'Làm đẹp'],
                            ['value' => 'sports', 'label' => 'Thể thao'],
                        ],
                    ],
                ],
                'is_active' => true,
            ],

            // 3. Product Review Form
            [
                'name' => 'Product Review',
                'description' => 'Form đánh giá sản phẩm từ khách hàng',
                'fields' => [
                    [
                        'name' => 'reviewer_name',
                        'label' => 'Tên người đánh giá',
                        'type' => 'text',
                        'width' => '6',
                        'placeholder' => 'Tên của bạn',
                        'required' => true,
                    ],
                    [
                        'name' => 'reviewer_email',
                        'label' => 'Email',
                        'type' => 'email',
                        'width' => '6',
                        'placeholder' => 'Email của bạn',
                        'required' => true,
                    ],
                    [
                        'name' => 'rating',
                        'label' => 'Đánh giá',
                        'type' => 'select',
                        'width' => '12',
                        'placeholder' => 'Chọn số sao',
                        'required' => true,
                        'options' => [
                            ['value' => '5', 'label' => '5 sao - Tuyệt vời'],
                            ['value' => '4', 'label' => '4 sao - Tốt'],
                            ['value' => '3', 'label' => '3 sao - Bình thường'],
                            ['value' => '2', 'label' => '2 sao - Kém'],
                            ['value' => '1', 'label' => '1 sao - Rất kém'],
                        ],
                    ],
                    [
                        'name' => 'review_title',
                        'label' => 'Tiêu đề đánh giá',
                        'type' => 'text',
                        'width' => '12',
                        'placeholder' => 'Tóm tắt ngắn gọn về đánh giá',
                        'required' => true,
                    ],
                    [
                        'name' => 'review_content',
                        'label' => 'Nội dung đánh giá',
                        'type' => 'textarea',
                        'width' => '12',
                        'placeholder' => 'Chia sẻ chi tiết về trải nghiệm sử dụng sản phẩm...',
                        'required' => true,
                    ],
                ],
                'is_active' => true,
            ],

            // 4. Quote Request Form
            [
                'name' => 'Quote Request',
                'description' => 'Form yêu cầu báo giá cho doanh nghiệp',
                'fields' => [
                    [
                        'name' => 'company_name',
                        'label' => 'Tên công ty',
                        'type' => 'text',
                        'width' => '6',
                        'placeholder' => 'Tên công ty/tổ chức',
                        'required' => true,
                    ],
                    [
                        'name' => 'contact_person',
                        'label' => 'Người liên hệ',
                        'type' => 'text',
                        'width' => '6',
                        'placeholder' => 'Tên người đại diện',
                        'required' => true,
                    ],
                    [
                        'name' => 'email',
                        'label' => 'Email công ty',
                        'type' => 'email',
                        'width' => '6',
                        'placeholder' => 'email@company.com',
                        'required' => true,
                    ],
                    [
                        'name' => 'phone',
                        'label' => 'Số điện thoại',
                        'type' => 'tel',
                        'width' => '6',
                        'placeholder' => '0123456789',
                        'required' => true,
                    ],
                    [
                        'name' => 'product_category',
                        'label' => 'Danh mục sản phẩm quan tâm',
                        'type' => 'select',
                        'width' => '6',
                        'placeholder' => 'Chọn danh mục',
                        'required' => true,
                        'options' => [
                            ['value' => 'electronics', 'label' => 'Điện tử'],
                            ['value' => 'fashion', 'label' => 'Thời trang'],
                            ['value' => 'home_appliances', 'label' => 'Gia dụng'],
                            ['value' => 'office_supplies', 'label' => 'Văn phòng phẩm'],
                            ['value' => 'other', 'label' => 'Khác'],
                        ],
                    ],
                    [
                        'name' => 'quantity',
                        'label' => 'Số lượng dự kiến',
                        'type' => 'number',
                        'width' => '6',
                        'placeholder' => 'Nhập số lượng',
                        'required' => false,
                    ],
                    [
                        'name' => 'requirements',
                        'label' => 'Yêu cầu chi tiết',
                        'type' => 'textarea',
                        'width' => '12',
                        'placeholder' => 'Mô tả chi tiết về sản phẩm, yêu cầu kỹ thuật, thời gian giao hàng...',
                        'required' => true,
                    ],
                ],
                'is_active' => true,
            ],

            // 5. Job Application Form
            [
                'name' => 'Job Application',
                'description' => 'Form ứng tuyển việc làm',
                'fields' => [
                    [
                        'name' => 'full_name',
                        'label' => 'Họ và tên',
                        'type' => 'text',
                        'width' => '6',
                        'placeholder' => 'Họ và tên đầy đủ',
                        'required' => true,
                    ],
                    [
                        'name' => 'email',
                        'label' => 'Email',
                        'type' => 'email',
                        'width' => '6',
                        'placeholder' => 'email@example.com',
                        'required' => true,
                    ],
                    [
                        'name' => 'phone',
                        'label' => 'Số điện thoại',
                        'type' => 'tel',
                        'width' => '6',
                        'placeholder' => '0123456789',
                        'required' => true,
                    ],
                    [
                        'name' => 'position',
                        'label' => 'Vị trí ứng tuyển',
                        'type' => 'select',
                        'width' => '6',
                        'placeholder' => 'Chọn vị trí',
                        'required' => true,
                        'options' => [
                            ['value' => 'developer', 'label' => 'Lập trình viên'],
                            ['value' => 'designer', 'label' => 'Thiết kế'],
                            ['value' => 'marketing', 'label' => 'Marketing'],
                            ['value' => 'sales', 'label' => 'Kinh doanh'],
                            ['value' => 'customer_service', 'label' => 'Chăm sóc khách hàng'],
                        ],
                    ],
                    [
                        'name' => 'experience',
                        'label' => 'Kinh nghiệm làm việc',
                        'type' => 'select',
                        'width' => '6',
                        'placeholder' => 'Chọn mức kinh nghiệm',
                        'required' => true,
                        'options' => [
                            ['value' => 'fresh', 'label' => 'Mới tốt nghiệp'],
                            ['value' => '1-2', 'label' => '1-2 năm'],
                            ['value' => '3-5', 'label' => '3-5 năm'],
                            ['value' => '5+', 'label' => 'Trên 5 năm'],
                        ],
                    ],
                    [
                        'name' => 'salary_expectation',
                        'label' => 'Mức lương mong muốn',
                        'type' => 'select',
                        'width' => '6',
                        'placeholder' => 'Chọn mức lương',
                        'required' => false,
                        'options' => [
                            ['value' => '5-10', 'label' => '5-10 triệu'],
                            ['value' => '10-15', 'label' => '10-15 triệu'],
                            ['value' => '15-20', 'label' => '15-20 triệu'],
                            ['value' => '20+', 'label' => 'Trên 20 triệu'],
                            ['value' => 'negotiate', 'label' => 'Thỏa thuận'],
                        ],
                    ],
                    [
                        'name' => 'cover_letter',
                        'label' => 'Thư xin việc',
                        'type' => 'textarea',
                        'width' => '12',
                        'placeholder' => 'Giới thiệu bản thân và lý do ứng tuyển vào vị trí này...',
                        'required' => true,
                    ],
                ],
                'is_active' => true,
            ],

            // 6. Event Registration
            [
                'name' => 'Event Registration',
                'description' => 'Form đăng ký tham gia sự kiện',
                'fields' => [
                    [
                        'name' => 'participant_name',
                        'label' => 'Tên người tham gia',
                        'type' => 'text',
                        'width' => '6',
                        'placeholder' => 'Họ và tên',
                        'required' => true,
                    ],
                    [
                        'name' => 'email',
                        'label' => 'Email',
                        'type' => 'email',
                        'width' => '6',
                        'placeholder' => 'email@example.com',
                        'required' => true,
                    ],
                    [
                        'name' => 'phone',
                        'label' => 'Số điện thoại',
                        'type' => 'tel',
                        'width' => '6',
                        'placeholder' => '0123456789',
                        'required' => true,
                    ],
                    [
                        'name' => 'organization',
                        'label' => 'Tổ chức/Công ty',
                        'type' => 'text',
                        'width' => '6',
                        'placeholder' => 'Tên tổ chức (nếu có)',
                        'required' => false,
                    ],
                    [
                        'name' => 'ticket_type',
                        'label' => 'Loại vé',
                        'type' => 'select',
                        'width' => '6',
                        'placeholder' => 'Chọn loại vé',
                        'required' => true,
                        'options' => [
                            ['value' => 'free', 'label' => 'Vé miễn phí'],
                            ['value' => 'standard', 'label' => 'Vé thường'],
                            ['value' => 'vip', 'label' => 'Vé VIP'],
                            ['value' => 'student', 'label' => 'Vé sinh viên'],
                        ],
                    ],
                    [
                        'name' => 'dietary_requirements',
                        'label' => 'Yêu cầu ăn uống',
                        'type' => 'select',
                        'width' => '6',
                        'placeholder' => 'Chọn yêu cầu đặc biệt',
                        'required' => false,
                        'options' => [
                            ['value' => 'none', 'label' => 'Không có'],
                            ['value' => 'vegetarian', 'label' => 'Chay'],
                            ['value' => 'halal', 'label' => 'Halal'],
                            ['value' => 'gluten_free', 'label' => 'Không gluten'],
                        ],
                    ],
                    [
                        'name' => 'additional_notes',
                        'label' => 'Ghi chú thêm',
                        'type' => 'textarea',
                        'width' => '12',
                        'placeholder' => 'Các yêu cầu đặc biệt khác (nếu có)...',
                        'required' => false,
                    ],
                ],
                'is_active' => true,
            ],
        ];

        foreach ($templates as $tmpl) {
            FormTemplate::updateOrCreate(
                [
                    'name' => $tmpl['name'],
                    'project_id' => $projectId,
                ],
                [
                    'tenant_id' => $tenantId,
                    'description' => $tmpl['description'],
                    'fields' => $tmpl['fields'],
                    'is_active' => $tmpl['is_active'],
                ]
            );
        }
    }
}
