<?php

namespace App\Console\Commands;

use App\Models\Project;
use App\Services\ViettinmartDeployService;
use Illuminate\Console\Command;

class DeployViettinmartCommand extends Command
{
    protected $signature = 'project:deploy-vtm 
                            {project_id? : ID of the project to deploy Viettinmart template to} 
                            {--tenant_id= : Optional tenant ID}';

    protected $description = 'Deploy and configure a complete Viettinmart E-commerce solution (1-Click VTM) to a project';

    public function handle(ViettinmartDeployService $deployService): int
    {
        $projectId = $this->argument('project_id');
        $tenantId = $this->option('tenant_id') ? (int) $this->option('tenant_id') : null;

        if (! $projectId) {
            $project = Project::where('code', 'viettinmart-eco')
                ->orWhere('code', 'viettinmart')
                ->orWhere('name', 'like', '%Viettinmart%')
                ->orWhere('id', 10)
                ->first();
        } else {
            $project = Project::find($projectId);
        }

        if (! $project) {
            $this->error('Không tìm thấy dự án với ID hoặc Code đã chỉ định!');

            return self::FAILURE;
        }

        $this->info("🚀 Bắt đầu triển khai mẫu Viettinmart cho dự án: {$project->name} ({$project->code}, ID: {$project->id})...");

        try {
            $result = $deployService->deploy($project, $tenantId);

            $this->newLine();
            $this->info('==================================================');
            $this->info('🎉 TRIỂN KHAI VIETTINMART (VTM) THÀNH CÔNG!');
            $this->info('==================================================');
            $this->line("• Tên dự án:        <comment>{$result['project']->name}</comment>");
            $this->line("• Mã dự án (Code):  <comment>{$result['project']->code}</comment>");
            $this->line("• Tenant ID:        <comment>{$result['tenant_id']}</comment>");
            $this->line("• CMS Username:     <info>{$result['admin_username']}</info>");
            $this->line("• CMS Password:     <info>{$result['admin_password']}</info>");
            $this->line("• Frontend URL:     <href={$result['frontend_url']}>{$result['frontend_url']}</>");
            $this->line("• CMS Admin URL:    <href={$result['admin_url']}>{$result['admin_url']}</>");
            $this->line("• Cài đặt ngôn ngữ: <href={$result['languages_url']}>{$result['languages_url']}</>");
            $this->info('==================================================');

            return self::SUCCESS;
        } catch (\Throwable $e) {
            $this->error("❌ Lỗi trong quá trình triển khai VTM: {$e->getMessage()}");
            $this->error($e->getTraceAsString());

            return self::FAILURE;
        }
    }
}
