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
        Schema::table('contracts', function (Blueprint $table) {
            $table->longText('description')->nullable()->change();
            $table->longText('technical_requirements')->nullable()->change();
            $table->longText('features')->nullable()->change();
            $table->longText('client_resource_details')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
            $table->text('technical_requirements')->nullable()->change();
            $table->text('features')->nullable()->change();
            $table->text('client_resource_details')->nullable()->change();
        });
    }
};
