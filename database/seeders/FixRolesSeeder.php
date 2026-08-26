<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class FixRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Delete all non-standard roles
        $standardRoleNames = ['manager', 'employee', 'visitor'];
        Role::whereNotIn('name', $standardRoleNames)->delete();

        // 2. Create standard roles if they don't exist
        $managerRole = Role::firstOrCreate(['name' => 'manager'], ['display_name' => 'Quản lý', 'description' => 'Quản lý toàn bộ hệ thống']);
        $employeeRole = Role::firstOrCreate(['name' => 'employee'], ['display_name' => 'Nhân viên', 'description' => 'Nhân viên công ty (Thấy danh sách NV và Việc của tôi)']);
        $visitorRole = Role::firstOrCreate(['name' => 'visitor'], ['display_name' => 'Khách', 'description' => 'Khách truy cập']);

        // 3. Update all users
        $users = User::all();
        foreach ($users as $user) {
            $newRoleStr = 'visitor'; // Default fallback
            $newRoleModel = $visitorRole;

            // Map old string roles or level logic to new roles
            if ($user->role === 'superadmin' || $user->role === 'super_admin' || $user->role === 'admin' || $user->role === 'manager' || $user->level === 0 || $user->level === 1) {
                $newRoleStr = 'manager';
                $newRoleModel = $managerRole;
            } elseif ($user->role === 'employee' || $user->role === 'cms' || $user->role === 'account' || $user->role === 'dev') {
                $newRoleStr = 'employee';
                $newRoleModel = $employeeRole;
            }

            // Also check old roles attached to user
            $oldRoles = $user->roles()->pluck('name')->toArray();
            if (in_array('superadmin', $oldRoles) || in_array('admin', $oldRoles) || in_array('manager', $oldRoles)) {
                $newRoleStr = 'manager';
                $newRoleModel = $managerRole;
            } elseif (in_array('employee', $oldRoles)) {
                $newRoleStr = 'employee';
                $newRoleModel = $employeeRole;
            }

            // Ensure super root is always manager
            if ($user->email === 'admin@example.com' || $user->username === 'fukkatsu') {
                $newRoleStr = 'manager';
                $newRoleModel = $managerRole;
            }

            // Update user table
            $user->update(['role' => $newRoleStr, 'level' => ($newRoleStr === 'manager' ? 1 : 2)]);

            // Update pivot table (sync)
            $user->roles()->sync([$newRoleModel->id]);
        }

        $this->command->info('Roles structure successfully simplified to manager, employee, and visitor.');
    }
}
