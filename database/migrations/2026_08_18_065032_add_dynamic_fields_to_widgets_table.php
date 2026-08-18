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
        Schema::table('widgets', function (Blueprint $table) {
            $table->string('widget_code')->nullable()->unique()->after('id');
            $table->json('rules')->nullable()->after('settings');
            $table->json('data')->nullable()->after('rules');
            $table->boolean('is_lazy_loaded')->default(false)->after('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('widgets', function (Blueprint $table) {
            $table->dropColumn(['widget_code', 'rules', 'data', 'is_lazy_loaded']);
        });
    }
};
