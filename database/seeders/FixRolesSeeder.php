<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        $employeeRole = Role::firstOrCreate(['name' => 'employee'], ['display_name' => 'Nhân viên', 'description' => 'Nhân viên công ty']);
        $visitorRole = Role::firstOrCreate(['name' => 'visitor'], ['display_name' => 'Khách', 'description' => 'Khách truy cập']);

        // 3. Update all users
        $users = User::all();
        foreach ($users as $user) {
            $newRoleStr = 'visitor'; // Default fallback
            $newRoleModel = $visitorRole;

            // Map old string roles or level logic to new roles
            if ($user->role === 'superadmin' || $user->role === 'super_admin' || $user->role === 'admin' || $user->level === 0 || $user->level === 1) {
                $newRoleStr = 'manager';
                $newRoleModel = $managerRole;
            } elseif ($user->role === 'employee' || $user->role === 'cms' || $user->role === 'account' || $user->role === 'dev') {
                $newRoleStr = 'employee';
                $newRoleModel = $employeeRole;
            } elseif ($user->role === 'manager') {
                $newRoleStr = 'manager';
                $newRoleModel = $managerRole;
            }

            // Also check old roles attached to user
            $oldRoles = $user->roles()->pluck('name')->toArray();
            if (in_array('superadmin', $oldRoles) || in_array('admin', $oldRoles)) {
                $newRoleStr = 'manager';
                $newRoleModel = $managerRole;
            }

            // Ensure super root is always manager
            if ($user->email === 'admin@example.com' || $user->username === 'fukkatsu') {
                $newRoleStr = 'manager';
                $newRoleModel = $managerRole;
            }

            // Update user table
            $user->update(['role' => $newRoleStr]);

            // Update pivot table (sync)
            $user->roles()->sync([$newRoleModel->id]);
        }
        
        $this->command->info('Roles structure successfully simplified to manager, employee, and visitor.');
    }
}
