<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('brands')) {
            $existingIndexes = collect(Schema::getIndexes('brands'))->pluck('name')->toArray();
            Schema::table('brands', function (Blueprint $table) use ($existingIndexes) {
                if (in_array('brands_slug_unique', $existingIndexes)) {
                    $table->dropUnique('brands_slug_unique');
                }
                if (! in_array('brands_project_slug_unique', $existingIndexes)) {
                    $table->unique(['project_id', 'slug'], 'brands_project_slug_unique');
                }
            });
        }

        if (Schema::hasTable('product_categories')) {
            $existingIndexes = collect(Schema::getIndexes('product_categories'))->pluck('name')->toArray();
            Schema::table('product_categories', function (Blueprint $table) use ($existingIndexes) {
                if (in_array('product_categories_slug_unique', $existingIndexes)) {
                    $table->dropUnique('product_categories_slug_unique');
                }
                if (! in_array('product_categories_project_slug_unique', $existingIndexes)) {
                    $table->unique(['project_id', 'slug'], 'product_categories_project_slug_unique');
                }
            });
        }

        if (Schema::hasTable('coupons')) {
            $existingIndexes = collect(Schema::getIndexes('coupons'))->pluck('name')->toArray();
            Schema::table('coupons', function (Blueprint $table) use ($existingIndexes) {
                if (in_array('coupons_code_unique', $existingIndexes)) {
                    $table->dropUnique('coupons_code_unique');
                }
                if (! in_array('coupons_project_code_unique', $existingIndexes)) {
                    $table->unique(['project_id', 'code'], 'coupons_project_code_unique');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('coupons')) {
            Schema::table('coupons', function (Blueprint $table) {
                $table->dropUnique('coupons_project_code_unique');
                $table->unique('code', 'coupons_code_unique');
            });
        }

        if (Schema::hasTable('product_categories')) {
            Schema::table('product_categories', function (Blueprint $table) {
                $table->dropUnique('product_categories_project_slug_unique');
                $table->unique('slug', 'product_categories_slug_unique');
            });
        }

        if (Schema::hasTable('brands')) {
            Schema::table('brands', function (Blueprint $table) {
                $table->dropUnique('brands_project_slug_unique');
                $table->unique('slug', 'brands_slug_unique');
            });
        }
    }
};
