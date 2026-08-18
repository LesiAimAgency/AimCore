<?php

namespace Database\Seeders;

use App\Models\Contract;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class MyTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch users
        $admin = User::where('email', 'admin@example.com')->first();
        $pm = User::where('email', 'pm@example.com')->first() ?? $admin;
        $webDev = User::where('email', 'web@example.com')->first() ?? $admin;
        $designer = User::where('email', 'designer@example.com')->first() ?? $admin;

        // Fetch or create sample projects
        $project1 = Project::first();
        if (! $project1) {
            $contract = Contract::firstOrCreate(
                ['title' => 'Hợp đồng Website Thương Mại'],
                ['client_name' => 'Công ty ABC', 'service_type' => 'website', 'status' => 'active']
            );
            $project1 = Project::create([
                'name' => 'Dự án Website Thương Mại Điện Tử',
                'code' => 'DA-ECOMMERCE',
                'contract_id' => $contract->id,
                'status' => 'active',
                'total_gold' => 2000,
                'notes' => 'Xây dựng website bán hàng đa kênh cho khách hàng VIP',
            ]);
        } else {
            $project1->update(['total_gold' => 2000]);
        }

        $project2 = Project::where('id', '!=', $project1->id)->first();
        if ($project2) {
            $project2->update(['total_gold' => 1500]);
        } else {
            $project2 = $project1;
        }

        $now = now();

        // Xóa tasks cũ nếu có
        Task::query()->delete();

        $tasks = [
            // Task 1: PM giao cho Web Dev - Đã duyệt, Web Dev đã nhận việc (150 Gold)
            [
                'title' => 'Fix lỗi cổng thanh toán VNPay trên website',
                'description' => 'Khách hàng báo lỗi thanh toán không trả về kết quả thành công lúc 12h trưa',
                'project_id' => $project1->id,
                'user_id' => $pm->id,
                'assigned_to' => $webDev->id,
                'gold' => 150,
                'gold_awarded' => false,
                'status' => 'in_progress',
                'priority' => 'urgent',
                'approval_status' => 'approved',
                'acceptance_status' => 'accepted',
                'start_date' => $now->copy()->subDay(),
                'deadline' => $now->copy()->addDay(),
                'position' => 1,
            ],

            // Task 2: PM giao cho Designer - Chờ Admin/PM duyệt (100 Gold)
            [
                'title' => 'Thiết kế Banner Hero và Popup khuyến mãi',
                'description' => 'Thiết kế 3 banner trang chủ và 1 popup ưu đãi theo tone màu brand',
                'project_id' => $project2->id,
                'user_id' => $pm->id,
                'assigned_to' => $designer->id,
                'gold' => 100,
                'gold_awarded' => false,
                'status' => 'todo',
                'priority' => 'high',
                'approval_status' => 'pending',
                'acceptance_status' => 'pending',
                'start_date' => $now->copy(),
                'deadline' => $now->copy()->addDays(2),
                'position' => 2,
            ],

            // Task 3: PM giao cho Web Dev - Đã duyệt, Chờ Web Dev chấp nhận (120 Gold)
            [
                'title' => 'Tối ưu tốc độ tải trang (PageSpeed Insights > 90)',
                'description' => 'Nén ảnh WebP, lazyload iframe, cache database queries',
                'project_id' => $project1->id,
                'user_id' => $pm->id,
                'assigned_to' => $webDev->id,
                'gold' => 120,
                'gold_awarded' => false,
                'status' => 'todo',
                'priority' => 'high',
                'approval_status' => 'approved',
                'acceptance_status' => 'pending',
                'start_date' => $now->copy(),
                'deadline' => $now->copy()->addDays(3),
                'position' => 3,
            ],

            // Task 4: Designer tự tạo công việc cho mình (80 Gold)
            [
                'title' => 'Vẽ bộ icon tùy chỉnh cho menu danh mục sản phẩm',
                'description' => 'Bộ icon 12 biểu tượng định dạng SVG nét mảnh hiện đại',
                'project_id' => $project2->id,
                'user_id' => $designer->id,
                'assigned_to' => $designer->id,
                'gold' => 80,
                'gold_awarded' => false,
                'status' => 'in_progress',
                'priority' => 'medium',
                'approval_status' => 'approved',
                'acceptance_status' => 'accepted',
                'start_date' => $now->copy()->subDays(2),
                'deadline' => $now->copy()->addDays(4),
                'position' => 4,
            ],

            // Task 5: Web Dev tự tạo công việc cá nhân (100 Gold)
            [
                'title' => 'Cập nhật tài liệu API và cấu hình webhook đơn hàng',
                'description' => 'Viết docs swagger và cấu hình callback sang hệ thống kho vận',
                'project_id' => $project1->id,
                'user_id' => $webDev->id,
                'assigned_to' => $webDev->id,
                'gold' => 100,
                'gold_awarded' => false,
                'status' => 'todo',
                'priority' => 'medium',
                'approval_status' => 'approved',
                'acceptance_status' => 'accepted',
                'start_date' => $now->copy()->subDay(),
                'deadline' => $now->copy()->addDays(5),
                'position' => 5,
            ],

            // Task 6: PM giao cho Designer (90 Gold)
            [
                'title' => 'Xuất file mockup bao bì sản phẩm hộp quà tết',
                'description' => 'Gửi file PDF in ấn chuẩn CMYK 300DPI',
                'project_id' => $project2->id,
                'user_id' => $pm->id,
                'assigned_to' => $designer->id,
                'gold' => 90,
                'gold_awarded' => false,
                'status' => 'todo',
                'priority' => 'high',
                'approval_status' => 'approved',
                'acceptance_status' => 'accepted',
                'start_date' => $now->copy()->subDays(5),
                'deadline' => $now->copy()->subDay(),
                'position' => 6,
            ],

            // Task 7: Đã hoàn thành (200 Gold - Chờ duyệt trao thưởng)
            [
                'title' => 'Khởi tạo cấu trúc Database và Module Authentication',
                'description' => 'Tạo migration, seeders, phân quyền 4 vai trò',
                'project_id' => $project1->id,
                'user_id' => $pm->id,
                'assigned_to' => $pm->id,
                'gold' => 200,
                'gold_awarded' => false,
                'status' => 'completed',
                'priority' => 'high',
                'approval_status' => 'approved',
                'acceptance_status' => 'accepted',
                'start_date' => $now->copy()->subDays(10),
                'deadline' => $now->copy()->subDays(6),
                'position' => 7,
                'completed_at' => $now->copy()->subDays(6),
            ],

            // Task 8: Đã hoàn thành (150 Gold - Chờ duyệt trao thưởng)
            [
                'title' => 'Thống nhất bảng màu và Font chữ thương hiệu',
                'description' => 'Phê duyệt màu chủ đạo Navy Blue và typography Outfit',
                'project_id' => $project2->id,
                'user_id' => $pm->id,
                'assigned_to' => $designer->id,
                'gold' => 150,
                'gold_awarded' => false,
                'status' => 'completed',
                'priority' => 'medium',
                'approval_status' => 'approved',
                'acceptance_status' => 'accepted',
                'start_date' => $now->copy()->subDays(12),
                'deadline' => $now->copy()->subDays(8),
                'position' => 8,
                'completed_at' => $now->copy()->subDays(8),
            ],
        ];

        foreach ($tasks as $taskData) {
            Task::create($taskData);
        }

        $this->command->info('Đã seed thành công dữ liệu mẫu My Tasks với đầy đủ điều phối nhân sự, duyệt task, accept task và ưu tiên.');
    }
}
