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
        if (! Schema::hasTable('product_combos')) {
            Schema::create('product_combos', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('project_id')->nullable()->index();
                $table->unsignedBigInteger('tenant_id')->nullable()->index();
                $table->unsignedBigInteger('product_id')->index();
                $table->unsignedBigInteger('combo_product_id')->index();
                $table->unsignedBigInteger('variant_id')->nullable();
                $table->decimal('combo_price', 15, 2)->default(0);
                $table->decimal('discount_amount', 15, 2)->default(0);
                $table->integer('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_combos');
    }
};
