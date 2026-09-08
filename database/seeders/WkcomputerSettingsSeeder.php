<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Services\SettingsService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WkcomputerSettingsSeeder extends Seeder
{
    public function run(?int $projectId = null, ?int $tenantId = null): void
    {
        if (! $projectId) {
            $project = Project::where('code', 'wkcomputer')->first();
            if (! $project) {
                [$project, $tenant] = (new WkcomputerMasterSeeder)->ensureProjectAndTenant($projectId, $tenantId);
            }
            $projectId = $project->id;
            $tenantId = $tenantId ?? $project->tenant_id;
        }

        $showrooms = [
            [
                'name' => 'Showroom 1 (Trụ sở chính)',
                'address' => '123 Đường Công Nghệ, Quận IT, TP. Hồ Chí Minh',
                'phone' => '1900 8888',
                'hours' => '08:00 - 21:30 (Cả CN & Ngày lễ)',
            ],
            [
                'name' => 'Showroom 2 (Phan Thiết)',
                'address' => '456 Trần Hưng Đạo, TP. Phan Thiết, Bình Thuận',
                'phone' => '0252 388 888',
                'hours' => '08:00 - 20:30 (Thứ 2 - Thứ 7)',
            ],
        ];

        $settings = [
            'site_name' => 'WKcomputer - Máy Tính, Laptop, Linh Kiện Gaming Chính Hãng',
            'site_title' => 'WKcomputer - Máy Tính, Laptop, Linh Kiện Chính Hãng',
            'site_description' => 'WKcomputer - Hệ thống bán lẻ laptop, PC, linh kiện, gaming gear và phụ kiện công nghệ chính hãng. Bảo hành dài hạn, giao hàng toàn quốc.',
            'theme' => 'wkcomputerdemo',
            'primary_color' => '#e11d48',
            'theme_option_primary_color' => '#e11d48',
            'secondary_color' => '#1e293b',
            'theme_option_secondary_color' => '#1e293b',
            'contact_email' => 'support@wkcomputer.vn',
            'contact_phone' => '1900 8888',
            'contact_address' => '123 Đường Công Nghệ, Quận IT, TP.HCM',
            'contact_zalo' => '0988888888',
            'social_facebook' => 'https://facebook.com/wkcomputer',
            'social_youtube' => 'https://youtube.com/@wkcomputer',
            'showrooms' => $showrooms,
            'payment_cod_enabled' => 1,
            'payment_bank_enabled' => 1,
            'bank_name' => 'Ngân hàng Quân Đội (MB Bank)',
            'bank_account' => '9999888888',
            'bank_account_name' => 'CONG TY CONG NGHE WKCOMPUTER',
            'vietqr_bank_id' => 'MB',
            'vietqr_account_no' => '9999888888',
            'vietqr_account_name' => 'CONG TY CONG NGHE WKCOMPUTER',
            'vietqr_template' => 'compact2',
            'free_shipping_threshold' => 1000000,
            'default_shipping_fee' => 30000,
        ];

        // Also check if raw settings json exists
        $rawSettingsFile = database_path('seeders/data/wkcomputer/wk_settings.json');
        if (file_exists($rawSettingsFile)) {
            $rawSettings = json_decode(file_get_contents($rawSettingsFile), true) ?? [];
            foreach ($rawSettings as $row) {
                $k = $row['key'] ?? null;
                $v = $row['payload'] ?? null;
                if ($k && ! isset($settings[$k]) && $v !== null) {
                    $decoded = json_decode($v, true);
                    $settings[$k] = $decoded !== null ? $decoded : $v;
                }
            }
        }

        foreach ($settings as $key => $val) {
            DB::table('settings')
                ->where('key', $key)
                ->where('project_id', $projectId)
                ->delete();

            DB::table('settings')->insert([
                'key' => $key,
                'payload' => is_array($val) ? json_encode($val) : json_encode(['value' => $val]),
                'group' => str_starts_with($key, 'theme_option_') ? 'theme' : 'general',
                'project_id' => $projectId,
                'tenant_id' => $tenantId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if (is_scalar($val)) {
                DB::connection('mysql')->table('project_settings')->updateOrInsert(
                    ['project_id' => $projectId, 'key' => $key],
                    ['value' => (string) $val, 'updated_at' => now()]
                );
            }
        }

        // Fonts
        $fonts = [
            ['id' => 'f1', 'key' => 'roboto', 'type' => 'google', 'label' => 'Roboto', 'load' => '400,500,700', 'is_default' => 1],
            ['id' => 'f2', 'key' => 'inter', 'type' => 'google', 'label' => 'Inter', 'load' => '400,600,700', 'is_default' => 0],
        ];
        DB::table('settings')->where('key', 'fonts')->where('project_id', $projectId)->delete();
        DB::table('settings')->insert([
            'key' => 'fonts',
            'payload' => json_encode($fonts),
            'group' => 'general',
            'project_id' => $projectId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if (class_exists(SettingsService::class)) {
            SettingsService::getInstance()->clearCache();
        }

        $this->command?->info("✓ Seeded settings for WKComputer (Project ID: {$projectId}).");
    }
}
