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
        Schema::table('taxonomies', function (Blueprint $table) {
            $table->dropUnique('taxonomies_slug_unique');
            $table->unique(['project_id', 'slug'], 'taxonomies_project_slug_unique');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropUnique('posts_unified_slug_unique');
            $table->unique(['project_id', 'slug'], 'posts_project_slug_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropUnique('posts_project_slug_unique');
            $table->unique('slug', 'posts_unified_slug_unique');
        });

        Schema::table('taxonomies', function (Blueprint $table) {
            $table->dropUnique('taxonomies_project_slug_unique');
            $table->unique('slug', 'taxonomies_slug_unique');
        });
    }
};
