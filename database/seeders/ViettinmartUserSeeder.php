<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ViettinmartUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(int $projectId = 10, int $tenantId = 3): void
    {
        $users = [
            // 1. Admin (Toàn quyền)
            [
                'email' => 'admin@viettinmart.com',
                'data' => [
                    'name' => 'Hệ Thống Admin',
                    'password' => Hash::make('123456aA@'),
                    'role' => User::ROLE_ADMIN,
                    'phone' => '0912345678',
                    'address' => 'Số 1 Nguyễn Huệ, Quận 1, TP. HCM',
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                    'tenant_id' => $tenantId,
                    'status' => 1,
                ],
            ],
            // 2. Manager (Quản lý)
            [
                'email' => 'manager@viettinmart.com',
                'data' => [
                    'name' => 'Quản Lý Chung',
                    'password' => Hash::make('123456aA@'),
                    'role' => User::ROLE_MANAGER,
                    'phone' => '0912345679',
                    'address' => '123 Cách Mạng Tháng 8, Quận 3, TP. HCM',
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                    'tenant_id' => $tenantId,
                    'status' => 1,
                ],
            ],
            // 3. Web Admin (Quản trị Website)
            [
                'email' => 'webadmin@viettinmart.com',
                'data' => [
                    'name' => 'Quản Trị Website',
                    'password' => Hash::make('123456aA@'),
                    'role' => User::ROLE_WEB_ADMIN,
                    'phone' => '0912345680',
                    'address' => '456 Lê Lợi, Quận 1, TP. HCM',
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                    'tenant_id' => $tenantId,
                    'status' => 1,
                ],
            ],
            // 4. Store Manager (Quản lý cửa hàng)
            [
                'email' => 'storemanager@viettinmart.com',
                'data' => [
                    'name' => 'Quản Lý Cửa Hàng',
                    'password' => Hash::make('123456aA@'),
                    'role' => User::ROLE_STORE_MANAGER,
                    'phone' => '0912345681',
                    'address' => '789 Võ Văn Tần, Quận 3, TP. HCM',
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                    'tenant_id' => $tenantId,
                    'status' => 1,
                ],
            ],
            // 5. Customer (Khách hàng)
            [
                'email' => 'customer@viettinmart.com',
                'data' => [
                    'name' => 'Nguyễn Văn Khách',
                    'password' => Hash::make('123456aA@'),
                    'role' => 'user',
                    'phone' => '0912345682',
                    'address' => '101 Nam Kỳ Khởi Nghĩa, Quận 1, TP. HCM',
                    'email_verified_at' => now(),
                    'remember_token' => Str::random(10),
                    'tenant_id' => $tenantId,
                    'status' => 1,
                ],
            ],
        ];

        foreach ($users as $u) {
            $user = User::updateOrCreate(['email' => $u['email']], $u['data']);
            if (method_exists($user, 'assignToProject')) {
                $user->assignToProject($projectId);
            }
        }
    }
}
