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
        // 1. Thêm cột department cho bảng users nếu chưa có
        if (! Schema::hasColumn('users', 'department')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('department')->nullable()->after('role');
            });
        }

        // 2. Thêm các cột nâng cấp cho bảng tasks
        Schema::table('tasks', function (Blueprint $table) {
            if (! Schema::hasColumn('tasks', 'assigned_to')) {
                $table->foreignId('assigned_to')->nullable()->after('user_id')->constrained('users')->nullOnDelete();
            }
            if (! Schema::hasColumn('tasks', 'priority')) {
                $table->string('priority')->default('medium')->after('status'); // low, medium, high, urgent
            }
            if (! Schema::hasColumn('tasks', 'approval_status')) {
                $table->string('approval_status')->default('approved')->after('priority'); // pending, approved, rejected
            }
            if (! Schema::hasColumn('tasks', 'acceptance_status')) {
                $table->string('acceptance_status')->default('accepted')->after('approval_status'); // pending, accepted, rejected
            }
            if (! Schema::hasColumn('tasks', 'rejection_reason')) {
                $table->text('rejection_reason')->nullable()->after('acceptance_status');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('users', 'department')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('department');
            });
        }

        Schema::table('tasks', function (Blueprint $table) {
            if (Schema::hasColumn('tasks', 'assigned_to')) {
                $table->dropConstrainedForeignId('assigned_to');
            }
            $table->dropColumn([
                'priority',
                'approval_status',
                'acceptance_status',
                'rejection_reason',
            ]);
        });
    }
};
