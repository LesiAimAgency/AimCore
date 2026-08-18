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
        // 1. Thêm cột gold vào bảng users
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'gold')) {
                $table->unsignedBigInteger('gold')->default(0)->after('email');
            }
        });

        // 2. Thêm cột total_gold vào bảng projects
        Schema::table('projects', function (Blueprint $table) {
            if (! Schema::hasColumn('projects', 'total_gold')) {
                $table->unsignedBigInteger('total_gold')->default(1000)->after('status');
            }
        });

        // 3. Thêm cột gold và gold_awarded vào bảng tasks
        Schema::table('tasks', function (Blueprint $table) {
            if (! Schema::hasColumn('tasks', 'gold')) {
                $table->unsignedInteger('gold')->default(0)->after('priority');
            }
            if (! Schema::hasColumn('tasks', 'gold_awarded')) {
                $table->boolean('gold_awarded')->default(false)->after('gold');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'gold')) {
                $table->dropColumn('gold');
            }
        });

        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'total_gold')) {
                $table->dropColumn('total_gold');
            }
        });

        Schema::table('tasks', function (Blueprint $table) {
            if (Schema::hasColumn('tasks', 'gold')) {
                $table->dropColumn('gold');
            }
            if (Schema::hasColumn('tasks', 'gold_awarded')) {
                $table->dropColumn('gold_awarded');
            }
        });
    }
};
