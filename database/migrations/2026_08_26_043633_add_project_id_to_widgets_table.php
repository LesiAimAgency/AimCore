<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Add project_id to the widgets table so that widgets can be scoped
     * per-project, enabling correct isolation when exporting and deploying.
     */
    public function up(): void
    {
        Schema::table('widgets', function (Blueprint $table) {
            if (! Schema::hasColumn('widgets', 'project_id')) {
                $table->unsignedBigInteger('project_id')->nullable()->after('id')->index();
                $table->foreign('project_id')->references('id')->on('projects')->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('widgets', function (Blueprint $table) {
            if (Schema::hasColumn('widgets', 'project_id')) {
                $table->dropForeign(['project_id']);
                $table->dropColumn('project_id');
            }
        });
    }
};
