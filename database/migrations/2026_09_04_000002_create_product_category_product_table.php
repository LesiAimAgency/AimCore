<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('product_category_product')) {
            Schema::create('product_category_product', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('product_id')->index();
                $table->unsignedBigInteger('product_category_id')->index();
                $table->timestamps();

                $table->unique(['product_id', 'product_category_id']);
            });

            // Populate from existing products_enhanced
            if (Schema::hasTable('products_enhanced') && Schema::hasColumn('products_enhanced', 'product_category_id')) {
                DB::statement('
                    INSERT IGNORE INTO product_category_product (product_id, product_category_id, created_at, updated_at)
                    SELECT id, product_category_id, NOW(), NOW()
                    FROM products_enhanced
                    WHERE product_category_id IS NOT NULL AND product_category_id > 0
                ');
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('product_category_product');
    }
};
