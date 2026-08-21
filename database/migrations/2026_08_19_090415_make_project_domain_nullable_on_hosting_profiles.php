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
        Schema::table('hosting_profiles', function (Blueprint $table) {
            $table->foreignId('project_id')->nullable()->change();
            $table->string('domain')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hosting_profiles', function (Blueprint $table) {
            $table->foreignId('project_id')->nullable(false)->change();
            $table->string('domain')->nullable(false)->change();
        });
    }
};
