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
        Schema::create('deployment_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('deployment_history_id')->constrained('deployment_history')->cascadeOnDelete();
            $table->string('step'); // Tên bước: validate, create_db, upload, configure, import, bootstrap, verify
            $table->text('message');
            $table->enum('level', ['info', 'warning', 'error', 'success'])->default('info');
            $table->unsignedSmallInteger('step_number')->default(0); // Thứ tự bước
            $table->json('context')->nullable(); // Metadata bổ sung (bytes uploaded, etc.)
            $table->timestamp('logged_at')->useCurrent();

            $table->index('deployment_history_id');
            $table->index(['deployment_history_id', 'step']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deployment_logs');
    }
};
