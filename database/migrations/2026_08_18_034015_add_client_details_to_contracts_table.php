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
            $table->string('contract_code')->nullable();
            $table->string('representative_name')->nullable();
            $table->string('representative_title')->nullable();
            $table->string('client_address')->nullable();
            $table->string('tax_code')->nullable();
            $table->string('client_phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->dropColumn([
                'contract_code',
                'representative_name',
                'representative_title',
                'client_address',
                'tax_code',
                'client_phone',
            ]);
        });
    }
};
