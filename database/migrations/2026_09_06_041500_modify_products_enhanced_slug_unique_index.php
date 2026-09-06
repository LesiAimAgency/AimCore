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
        if (Schema::hasTable('products_enhanced')) {
            $existingIndexes = collect(Schema::getIndexes('products_enhanced'))->pluck('name')->toArray();

            Schema::table('products_enhanced', function (Blueprint $table) use ($existingIndexes) {
                if (in_array('products_enhanced_slug_unique', $existingIndexes)) {
                    $table->dropUnique('products_enhanced_slug_unique');
                }

                if (in_array('products_enhanced_sku_unique', $existingIndexes)) {
                    $table->dropUnique('products_enhanced_sku_unique');
                }

                if (! in_array('products_enhanced_project_slug_unique', $existingIndexes)) {
                    $table->unique(['project_id', 'slug'], 'products_enhanced_project_slug_unique');
                }

                if (! in_array('products_enhanced_project_sku_unique', $existingIndexes)) {
                    $table->unique(['project_id', 'sku'], 'products_enhanced_project_sku_unique');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('products_enhanced')) {
            Schema::table('products_enhanced', function (Blueprint $table) {
                try {
                    $table->dropUnique('products_enhanced_project_sku_unique');
                    $table->unique('sku', 'products_enhanced_sku_unique');
                } catch (Exception $e) {
                }

                try {
                    $table->dropUnique('products_enhanced_project_slug_unique');
                    $table->unique('slug', 'products_enhanced_slug_unique');
                } catch (Exception $e) {
                }
            });
        }
    }
};
