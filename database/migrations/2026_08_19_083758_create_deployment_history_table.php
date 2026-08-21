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
        Schema::create('deployment_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('hosting_profile_id')->constrained()->cascadeOnDelete();
            $table->foreignId('deployed_by')->constrained('users')->cascadeOnDelete();
            $table->enum('status', ['pending', 'running', 'success', 'failed'])->default('pending');
            $table->string('source_hash', 64)->nullable(); // MD5 checksum của export ZIP
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->string('deployed_url')->nullable(); // URL sau khi deploy xong
            $table->text('error_message')->nullable(); // Lỗi cuối cùng nếu failed
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->index(['project_id', 'status']);
            $table->index('hosting_profile_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deployment_history');
    }
};
