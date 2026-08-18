<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CoreAgencyRolesSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Dọn dẹp Role cũ và các quyền không cần thiết
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('role_permissions')->truncate();
        DB::table('user_permissions')->truncate();
        DB::table('user_roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();

        // Xóa sạch tất cả tài khoản cũ để tạo lại đúng form phân quyền
        DB::table('users')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 2. Định nghĩa Core Permissions
        $permissions = [
            // Project Management & Admin scope
            ['name' => 'manage-contracts', 'display_name' => 'Quản lý Hợp đồng', 'group' => 'Project Management'],
            ['name' => 'manage-briefs', 'display_name' => 'Quản lý Briefs', 'group' => 'Project Management'],
            ['name' => 'approve-briefs', 'display_name' => 'Duyệt Briefs', 'group' => 'Project Management'],
            ['name' => 'manage-projects', 'display_name' => 'Quản lý Dự án', 'group' => 'Project Management'],

            // Task Management
            ['name' => 'manage-tasks', 'display_name' => 'Tạo & Điều phối Task', 'group' => 'Task Management'],
            ['name' => 'approve-tasks', 'display_name' => 'Duyệt Task trên Admin', 'group' => 'Task Management'],
            ['name' => 'review-tasks', 'display_name' => 'Nghiệm thu Task', 'group' => 'Task Management'],
            ['name' => 'update-tasks-progress', 'display_name' => 'Cập nhật tiến độ Task', 'group' => 'Task Management'],
            ['name' => 'accept-tasks', 'display_name' => 'Chấp nhận & Duyệt nhận việc', 'group' => 'Task Management'],

            // CMS Content (dành cho Web & Design)
            ['name' => 'manage-posts', 'display_name' => 'Quản lý Bài viết', 'group' => 'CMS Content'],
            ['name' => 'manage-pages', 'display_name' => 'Quản lý Trang', 'group' => 'CMS Content'],
            ['name' => 'manage-media', 'display_name' => 'Quản lý Media', 'group' => 'CMS Content'],
            ['name' => 'manage-products', 'display_name' => 'Quản lý Sản phẩm & Đơn hàng', 'group' => 'CMS Content'],

            // CMS Technical (dành riêng cho Web)
            ['name' => 'manage-theme', 'display_name' => 'Quản lý Giao diện (Theme)', 'group' => 'CMS Technical'],
            ['name' => 'manage-widgets', 'display_name' => 'Quản lý Widgets & Layouts', 'group' => 'CMS Technical'],
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm['name']], $perm);
        }

        // 3. Định nghĩa 4 Core Roles
        // Role 1: Super Admin / Root
        $superAdminRole = Role::firstOrCreate(
            ['name' => 'super_admin'],
            ['display_name' => 'Super Admin (Root)', 'description' => 'Tài khoản Root - Quản trị tối cao toàn hệ thống, toàn quyền', 'level' => 0]
        );
        $superAdminRole->permissions()->sync(Permission::pluck('id'));

        // Role 2: Quản lý dự án
        $pmRole = Role::firstOrCreate(
            ['name' => 'project_manager'],
            ['display_name' => 'Quản lý dự án', 'description' => 'Quản lý Dự án, Điều phối nhân sự làm task, Duyệt task, Hợp đồng & Brief', 'level' => 1]
        );
        $pmRole->permissions()->sync(Permission::whereIn('name', [
            'manage-contracts', 'manage-briefs', 'approve-briefs', 'manage-projects',
            'manage-tasks', 'approve-tasks', 'review-tasks', 'update-tasks-progress',
            'manage-posts', 'manage-pages', 'manage-media',
        ])->pluck('id'));

        // Role 3: Thiết kế website
        $webDesignerRole = Role::firstOrCreate(
            ['name' => 'web_designer'],
            ['display_name' => 'Thiết kế website', 'description' => 'Phụ trách Thiết kế website, Frontend/Backend CMS, Nhận và hoàn thành task', 'level' => 2]
        );
        $webDesignerRole->permissions()->sync(Permission::whereIn('name', [
            'update-tasks-progress', 'accept-tasks',
            'manage-posts', 'manage-pages', 'manage-media', 'manage-products', 'manage-theme', 'manage-widgets',
        ])->pluck('id'));

        // Role 4: Thiết kế
        $designerRole = Role::firstOrCreate(
            ['name' => 'designer'],
            ['display_name' => 'Thiết kế', 'description' => 'Phụ trách Đồ họa, Banner, UI/UX, Nhận và hoàn thành task thiết kế', 'level' => 2]
        );
        $designerRole->permissions()->sync(Permission::whereIn('name', [
            'update-tasks-progress', 'accept-tasks',
            'manage-media', 'manage-posts', 'manage-pages',
        ])->pluck('id'));

        // 4. Tạo Users chính thức theo 3 phòng ban và 4 vai trò
        $users = [
            [
                'email' => 'admin@example.com',
                'name' => 'Super Admin (Root)',
                'username' => 'admin',
                'password' => Hash::make('password'),
                'role' => 'super_admin',
                'department' => 'Quản trị hệ thống',
                'gold' => 0,
                'level' => 0, // Root level
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'email' => 'pm@example.com',
                'name' => 'Nguyễn Quản Lý (PM)',
                'username' => 'pm_lead',
                'password' => Hash::make('password'),
                'role' => 'project_manager',
                'department' => 'Quản lý dự án',
                'gold' => 0,
                'level' => 1,
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'email' => 'web@example.com',
                'name' => 'Trần Web Dev (Web Designer)',
                'username' => 'web_lead',
                'password' => Hash::make('password'),
                'role' => 'web_designer',
                'department' => 'Thiết kế website',
                'gold' => 0,
                'level' => 2,
                'status' => 1,
                'email_verified_at' => now(),
            ],
            [
                'email' => 'designer@example.com',
                'name' => 'Lê Designer (Graphic/UI)',
                'username' => 'designer_lead',
                'password' => Hash::make('password'),
                'role' => 'designer',
                'department' => 'Thiết kế',
                'gold' => 0,
                'level' => 2,
                'status' => 1,
                'email_verified_at' => now(),
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create($userData);
            $roleModel = Role::where('name', $userData['role'])->first();
            if ($roleModel) {
                $user->roles()->sync([$roleModel->id]);
            }
        }
    }
}
