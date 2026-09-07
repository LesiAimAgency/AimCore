<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Normalize menu_items for project 10 (VietTinMart -> tenant_id 3)
        if (Schema::hasColumn('menu_items', 'project_id') && Schema::hasColumn('menu_items', 'tenant_id')) {
            DB::table('menu_items')
                ->where('project_id', 10)
                ->where('tenant_id', '!=', 3)
                ->update(['tenant_id' => 3]);
        }

        // 2. Normalize settings for project 10 and project 14
        if (Schema::hasColumn('settings', 'project_id') && Schema::hasColumn('settings', 'tenant_id')) {
            DB::table('settings')
                ->where('project_id', 10)
                ->where(function ($q) {
                    $q->whereNull('tenant_id')->orWhere('tenant_id', '!=', 3);
                })
                ->update(['tenant_id' => 3]);

            DB::table('settings')
                ->where('project_id', 14)
                ->where(function ($q) {
                    $q->whereNull('tenant_id')->orWhere('tenant_id', '!=', 4);
                })
                ->update(['tenant_id' => 4]);
        }

        // 3. Remove orphaned duplicate categories ID 103-109 (tenant 4, project NULL with 0 products)
        if (Schema::hasTable('product_categories')) {
            DB::table('product_categories')
                ->whereBetween('id', [103, 109])
                ->whereNull('project_id')
                ->delete();

            // 4. Remove dummy categories 82-90 and products 196-205 (tenant NULL, project NULL)
            DB::table('product_categories')
                ->whereBetween('id', [82, 90])
                ->whereNull('tenant_id')
                ->whereNull('project_id')
                ->delete();
        }

        if (Schema::hasTable('products_enhanced')) {
            DB::table('products_enhanced')
                ->whereBetween('id', [196, 205])
                ->whereNull('tenant_id')
                ->whereNull('project_id')
                ->delete();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Data cleanup migration is irreversible
    }
};
