<?php

use App\Models\Role;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Role::firstOrCreate(
            ['name' => 'multi_tenancy'],
            [
                'display_name' => 'Multi-Tenancy Control Center',
                'description' => 'Quản trị và điều hành các website / tenant trong hệ thống Multi-Tenancy Control Center',
                'level' => 2,
                'is_default' => false,
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Role::where('name', 'multi_tenancy')->delete();
    }
};
