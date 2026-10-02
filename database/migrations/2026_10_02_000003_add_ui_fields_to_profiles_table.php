<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Add exact UI fields from eHenho template to profiles table.
     */
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            if (! Schema::hasColumn('profiles', 'weight')) {
                $table->string('weight', 50)->nullable()->after('height');
            }
            if (! Schema::hasColumn('profiles', 'district_name')) {
                $table->string('district_name', 100)->nullable()->after('province_name');
            }
            if (! Schema::hasColumn('profiles', 'headline')) {
                $table->string('headline', 255)->nullable()->after('slug');
            }
            if (! Schema::hasColumn('profiles', 'target_type')) {
                $table->string('target_type', 100)->nullable()->after('headline');
            }
            if (! Schema::hasColumn('profiles', 'body_type')) {
                $table->string('body_type', 100)->nullable()->after('education');
            }
            if (! Schema::hasColumn('profiles', 'personality')) {
                $table->string('personality', 150)->nullable()->after('interests');
            }
            if (! Schema::hasColumn('profiles', 'lifestyle')) {
                $table->string('lifestyle', 150)->nullable()->after('personality');
            }
            if (! Schema::hasColumn('profiles', 'precious')) {
                $table->string('precious', 150)->nullable()->after('lifestyle');
            }
            if (! Schema::hasColumn('profiles', 'religion')) {
                $table->string('religion', 100)->nullable()->after('occupation');
            }
            if (! Schema::hasColumn('profiles', 'smoking')) {
                $table->string('smoking', 100)->nullable()->after('religion');
            }
            if (! Schema::hasColumn('profiles', 'drinking')) {
                $table->string('drinking', 100)->nullable()->after('smoking');
            }
            if (! Schema::hasColumn('profiles', 'children')) {
                $table->string('children', 100)->nullable()->after('drinking');
            }
            if (! Schema::hasColumn('profiles', 'privacy_option')) {
                $table->string('privacy_option', 255)->nullable()->after('status');
            }
        });
    }

    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn([
                'weight',
                'district_name',
                'headline',
                'target_type',
                'body_type',
                'personality',
                'lifestyle',
                'precious',
                'religion',
                'smoking',
                'drinking',
                'children',
                'privacy_option',
            ]);
        });
    }
};
