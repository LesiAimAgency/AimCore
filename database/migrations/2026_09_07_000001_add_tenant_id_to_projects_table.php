<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasColumn('projects', 'tenant_id')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->unsignedBigInteger('tenant_id')->nullable()->after('id')->index();
            });
        }

        // Map known projects to their tenants
        $mapping = [
            'viettinmart-eco' => 3,
            'wkcomputer' => 4,
            'HD001' => 2,
            'HD0012333' => 1,
        ];

        foreach ($mapping as $code => $tenantId) {
            DB::table('projects')
                ->where('code', $code)
                ->update(['tenant_id' => $tenantId]);
        }

        // Fallback for any other project without tenant_id
        $projects = DB::table('projects')->whereNull('tenant_id')->get();
        foreach ($projects as $p) {
            $matchedTenant = DB::table('tenants')
                ->where('code', $p->code)
                ->orWhere('code', str_replace(['-eco', '-ecommerce', '-demo'], '', $p->code))
                ->first();
            if ($matchedTenant) {
                DB::table('projects')->where('id', $p->id)->update(['tenant_id' => $matchedTenant->id]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('projects', 'tenant_id')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->dropIndex(['tenant_id']);
                $table->dropColumn('tenant_id');
            });
        }
    }
};
