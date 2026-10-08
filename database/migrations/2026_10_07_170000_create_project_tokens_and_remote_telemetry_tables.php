<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Add remote supervision columns to projects table
        Schema::table('projects', function (Blueprint $table) {
            if (! Schema::hasColumn('projects', 'uuid')) {
                $table->char('uuid', 36)->nullable()->unique()->after('id');
            }
            if (! Schema::hasColumn('projects', 'project_key')) {
                $table->string('project_key', 100)->nullable()->after('uuid');
            }
            if (! Schema::hasColumn('projects', 'remote_url')) {
                $table->string('remote_url')->nullable()->after('subdomain');
            }
            if (! Schema::hasColumn('projects', 'external_domain')) {
                $table->string('external_domain')->nullable()->after('remote_url');
            }
            if (! Schema::hasColumn('projects', 'installation_id')) {
                $table->string('installation_id', 100)->nullable()->after('project_key');
            }
            if (! Schema::hasColumn('projects', 'cms_version')) {
                $table->string('cms_version', 30)->default('2.0.0')->after('features');
            }
            if (! Schema::hasColumn('projects', 'theme_version')) {
                $table->string('theme_version', 30)->default('1.0.0')->after('cms_version');
            }
            if (! Schema::hasColumn('projects', 'last_heartbeat_at')) {
                $table->timestamp('last_heartbeat_at')->nullable()->after('deployment_status');
            }
            if (! Schema::hasColumn('projects', 'connection_status')) {
                $table->string('connection_status', 30)->default('pending')->after('last_heartbeat_at');
            }
            if (! Schema::hasColumn('projects', 'remote_ip')) {
                $table->string('remote_ip', 45)->nullable()->after('connection_status');
            }
            if (! Schema::hasColumn('projects', 'health_metrics')) {
                $table->json('health_metrics')->nullable()->after('remote_ip');
            }
        });

        // Populate UUID for existing projects if null
        $projectsWithoutUuid = DB::table('projects')->whereNull('uuid')->get(['id']);
        foreach ($projectsWithoutUuid as $p) {
            DB::table('projects')->where('id', $p->id)->update([
                'uuid' => (string) Str::uuid(),
                'project_key' => 'prj_'.$p->id.'_'.Str::random(8),
            ]);
        }

        // 2. Create project_tokens table for Control Plane
        if (! Schema::hasTable('project_tokens')) {
            Schema::create('project_tokens', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('project_id');
                $table->string('name', 100)->default('default');
                $table->string('token_hash', 64)->index();
                $table->string('token_prefix', 16)->index();
                $table->json('abilities')->nullable();
                $table->timestamp('last_used_at')->nullable();
                $table->timestamp('expires_at')->nullable();
                $table->timestamp('revoked_at')->nullable();
                $table->timestamps();

                $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            });
        }

        // 3. Create remote_telemetry_logs table for audit trail
        if (! Schema::hasTable('remote_telemetry_logs')) {
            Schema::create('remote_telemetry_logs', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('project_id')->nullable()->index();
                $table->string('event_type', 50)->index();
                $table->string('ip_address', 45)->nullable();
                $table->json('payload')->nullable();
                $table->integer('status_code')->default(200);
                $table->timestamp('created_at')->useCurrent();

                $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remote_telemetry_logs');
        Schema::dropIfExists('project_tokens');

        Schema::table('projects', function (Blueprint $table) {
            $colsToDrop = array_intersect(
                ['uuid', 'project_key', 'installation_id', 'cms_version', 'theme_version', 'last_heartbeat_at', 'connection_status', 'remote_ip', 'health_metrics'],
                Schema::getColumnListing('projects')
            );
            if (! empty($colsToDrop)) {
                $table->dropColumn($colsToDrop);
            }
        });
    }
};
