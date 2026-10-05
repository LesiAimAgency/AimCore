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
        if (Schema::hasTable('menus')) {
            Schema::table('menus', function (Blueprint $table) {
                if (! Schema::hasColumn('menus', 'sort_order')) {
                    $table->integer('sort_order')->default(0)->after('location');
                }
                if (! Schema::hasColumn('menus', 'settings')) {
                    $table->json('settings')->nullable()->after('sort_order');
                }
            });
        }

        if (Schema::hasTable('menu_items')) {
            Schema::table('menu_items', function (Blueprint $table) {
                if (! Schema::hasColumn('menu_items', 'is_active')) {
                    $table->boolean('is_active')->default(true)->after('target');
                }
                if (! Schema::hasColumn('menu_items', 'css_class')) {
                    $table->string('css_class')->nullable()->after('icon');
                }
                if (! Schema::hasColumn('menu_items', 'settings')) {
                    $table->json('settings')->nullable()->after('badge_color');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('menus')) {
            Schema::table('menus', function (Blueprint $table) {
                if (Schema::hasColumn('menus', 'settings')) {
                    $table->dropColumn('settings');
                }
                if (Schema::hasColumn('menus', 'sort_order')) {
                    $table->dropColumn('sort_order');
                }
            });
        }

        if (Schema::hasTable('menu_items')) {
            Schema::table('menu_items', function (Blueprint $table) {
                if (Schema::hasColumn('menu_items', 'settings')) {
                    $table->dropColumn('settings');
                }
                if (Schema::hasColumn('menu_items', 'css_class')) {
                    $table->dropColumn('css_class');
                }
                if (Schema::hasColumn('menu_items', 'is_active')) {
                    $table->dropColumn('is_active');
                }
            });
        }
    }
};
