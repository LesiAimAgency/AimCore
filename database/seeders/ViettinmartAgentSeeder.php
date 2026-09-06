<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\Project;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;

class ViettinmartAgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(?int $projectId = null, ?int $tenantId = null): void
    {
        if (! $projectId) {
            $project = Project::where('code', 'viettinmart-eco')->orWhere('code', 'viettinmart')->first();
            $projectId = $project ? $project->id : 10;
        }

        if (! $tenantId || ! Tenant::where('id', $tenantId)->exists()) {
            $tenant = Tenant::where('code', 'viettinmart')
                ->orWhere('code', 'viettinmart-eco')
                ->orWhere('name', 'like', '%Viettinmart%')
                ->first();
            if (! $tenant) {
                $tenant = Tenant::find(3) ?? Tenant::first();
            }
            $tenantId = $tenant ? $tenant->id : null;
        }
        $webAdmin = User::where('role', User::ROLE_WEB_ADMIN)->first();
        $manager = User::where('role', User::ROLE_MANAGER)->first();
        $customer = User::where('email', 'customer@viettinmart.com')->first();

        $agents = [
            // 1. Nhà phân phối lớn
            [
                'code' => 'AGENT-001',
                'data' => [
                    'project_id' => $projectId,
                    'tenant_id' => $tenantId,
                    'name' => 'Tổng kho Miền Bắc',
                    'phone' => '0241234567',
                    'email' => 'mienbac@viettinmart.com',
                    'address' => 'Số 10 Tràng Thi, Hoàn Kiếm, Hà Nội',
                    'contact_person' => 'Ông Trần Phân Phối',
                    'region' => 'Hà Nội',
                    'type' => 'distributor',
                    'is_active' => true,
                    'user_id' => $manager ? $manager->id : null,
                ],
            ],
            // 2. Đại lý bán lẻ
            [
                'code' => 'AGENT-002',
                'data' => [
                    'project_id' => $projectId,
                    'tenant_id' => $tenantId,
                    'name' => 'VietTin Mart Quận 1',
                    'phone' => '0281234567',
                    'email' => 'quan1@viettinmart.com',
                    'address' => '100 Nguyễn Huệ, Quận 1, TP. HCM',
                    'contact_person' => 'Bà Nguyễn Bán Lẻ',
                    'region' => 'TP. Hồ Chí Minh',
                    'type' => 'retailer',
                    'is_active' => true,
                    'user_id' => $webAdmin ? $webAdmin->id : null,
                ],
            ],
            // 3. Đại lý nhượng quyền
            [
                'code' => 'AGENT-003',
                'data' => [
                    'project_id' => $projectId,
                    'tenant_id' => $tenantId,
                    'name' => 'Dylexe Franchise Cần Thơ',
                    'phone' => '0291234567',
                    'email' => 'cantho@viettinmart.com',
                    'address' => '50 Ninh Kiều, Cần Thơ',
                    'contact_person' => 'Anh Lê Nhượng Quyền',
                    'region' => 'Cần Thơ',
                    'type' => 'franchise',
                    'is_active' => true,
                    'user_id' => $customer ? $customer->id : null,
                ],
            ],
            // 4. Đại lý đang tạm ngưng
            [
                'code' => 'AGENT-004',
                'data' => [
                    'project_id' => $projectId,
                    'tenant_id' => $tenantId,
                    'name' => 'Đại lý Miền Trung (Tạm ngưng)',
                    'phone' => '0231234567',
                    'email' => 'mientrung@viettinmart.com',
                    'address' => '10 Hải Phòng, Đà Nẵng',
                    'contact_person' => 'Chị Võ Ngưng',
                    'region' => 'Đà Nẵng',
                    'type' => 'distributor',
                    'is_active' => false,
                ],
            ],
        ];

        foreach ($agents as $agent) {
            Agent::updateOrCreate(
                ['code' => $agent['code']],
                $agent['data']
            );
        }
    }
}
