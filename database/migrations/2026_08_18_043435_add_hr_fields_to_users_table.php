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
        Schema::table('users', function (Blueprint $table) {
            $table->string('employee_code')->nullable()->unique();
            $table->date('dob')->nullable();
            $table->string('identity_card')->nullable();
            $table->date('identity_date')->nullable();
            $table->string('identity_place')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('contract_type')->nullable(); // Thử việc, Chính thức, Part-time...
            $table->decimal('base_salary', 15, 2)->nullable();
            $table->unsignedBigInteger('manager_id')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('bank_name')->nullable();

            $table->foreign('manager_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['manager_id']);
            $table->dropColumn([
                'employee_code',
                'dob',
                'identity_card',
                'identity_date',
                'identity_place',
                'joining_date',
                'contract_type',
                'base_salary',
                'manager_id',
                'bank_account',
                'bank_name',
            ]);
        });
    }
};
