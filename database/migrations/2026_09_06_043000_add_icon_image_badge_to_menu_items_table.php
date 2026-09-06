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
        if (Schema::hasTable('menu_items')) {
            Schema::table('menu_items', function (Blueprint $table) {
                if (! Schema::hasColumn('menu_items', 'icon')) {
                    $table->string('icon')->nullable()->after('target');
                }
                if (! Schema::hasColumn('menu_items', 'image')) {
                    $table->string('image', 500)->nullable()->after('icon');
                }
                if (! Schema::hasColumn('menu_items', 'badge')) {
                    $table->string('badge', 100)->nullable()->after('image');
                }
                if (! Schema::hasColumn('menu_items', 'badge_color')) {
                    $table->string('badge_color', 50)->nullable()->after('badge');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('menu_items')) {
            Schema::table('menu_items', function (Blueprint $table) {
                $columnsToDrop = [];
                foreach (['icon', 'image', 'badge', 'badge_color'] as $col) {
                    if (Schema::hasColumn('menu_items', $col)) {
                        $columnsToDrop[] = $col;
                    }
                }
                if (! empty($columnsToDrop)) {
                    $table->dropColumn($columnsToDrop);
                }
            });
        }
    }
};
