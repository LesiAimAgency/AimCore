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
        Schema::table('projects', function (Blueprint $table) {
            $table->foreignId('department_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('service_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('current_stage_id')->nullable()->constrained('project_stages')->nullOnDelete();
            $table->json('dynamic_form_data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['department_id']);
            $table->dropForeign(['service_id']);
            $table->dropForeign(['current_stage_id']);
            $table->dropColumn(['department_id', 'service_id', 'current_stage_id', 'dynamic_form_data']);
        });
    }
};
