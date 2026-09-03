<?php

namespace App\Console\Commands;

use App\Models\DeploymentHistory;
use App\Services\Hosting\DeploymentService;
use Illuminate\Console\Command;

class TestDeployCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-deploy-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $history = DeploymentHistory::find(5);
        if (! $history) {
            $this->error('History not found');

            return;
        }
        $this->info('Starting deploy...');
        try {
            app(DeploymentService::class)->runExistingDeploy($history);
            $this->info('Deploy finished!');
        } catch (\Throwable $e) {
            $this->error('Deploy failed: '.$e->getMessage());
            $this->error($e->getTraceAsString());
        }
    }
}
