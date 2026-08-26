<?php

namespace Database\Seeders;

use App\Models\Contract;
use App\Models\Project;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AimAgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Tạo Tenant đơn giản
        $tenant = Tenant::firstOrCreate(
            ['code' => 'AimAgency'],
            [
                'name' => 'Aim Agency (Product Company)',
                'domain' => 'aimagency.local',
                'database_name' => 'aim_agency',
                'status' => 'active',
                'settings' => [
                    'theme' => 'default',
                    'language' => 'vi',
                    'timezone' => 'Asia/Ho_Chi_Minh',
                ],
            ]
        );

        // 2. Tạo User đơn giản (đại diện cho người quản lý)
        $user = User::firstOrCreate([
            'email' => 'admin@aimagency.local',
        ], [
            'name' => 'Aim Admin',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'status' => 1,
        ]);

        // 3. Tạo một Contract đơn giản cho công ty product
        $contract = Contract::firstOrCreate([
            'contract_code' => 'AIM-CT-001',
        ], [
            'title' => 'Aim Agency Internal Dev',
            'client_name' => 'Internal Product Team',
            'service_type' => 'Product Development',
            'technical_requirements' => 'Phát triển sản phẩm nội bộ (SaaS)',
            'start_date' => now(),
            'end_date' => now()->addYears(1),
            'status' => 'active',
        ]);

        // 4. Tạo Project đơn giản (Sản phẩm nội bộ)
        Project::firstOrCreate([
            'code' => 'AIM-PROD-01',
        ], [
            'contract_id' => $contract->id,
            'name' => 'Aim SaaS Core Product',
            'client_name' => 'Internal Product Team',
            'start_date' => now(),
            'deadline' => now()->addYears(1),
            'status' => 'active',
            'contract_value' => 500000000,
            'technical_requirements' => 'Laravel, VueJS, Decoupled Architecture',
            'features' => 'SaaS Product Features',
            'environment' => 'Development',
            'project_admin_username' => 'aim_admin',
            'project_admin_password' => Hash::make('password'),
            'created_by' => $user->id,
        ]);

        $this->command->info(' Đã tạo dữ liệu đơn giản cho công ty product: Aim Agency');
    }
}
