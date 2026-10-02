<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Standardize ehenho_* tables to standard schema names in core database.
     * Preserves 100% of data, columns, primary keys, and indexes.
     */
    public function up(): void
    {
        $tables = [
            'ehenho_provinces' => 'provinces',
            'ehenho_profiles' => 'profiles',
            'ehenho_conversations' => 'conversations',
            'ehenho_messages' => 'messages',
            'ehenho_social_connections' => 'social_connections',
        ];

        foreach ($tables as $oldTable => $newTable) {
            if (Schema::hasTable($oldTable) && ! Schema::hasTable($newTable)) {
                Schema::rename($oldTable, $newTable);
            }
        }
    }

    public function down(): void
    {
        $tables = [
            'provinces' => 'ehenho_provinces',
            'profiles' => 'ehenho_profiles',
            'conversations' => 'ehenho_conversations',
            'messages' => 'ehenho_messages',
            'social_connections' => 'ehenho_social_connections',
        ];

        foreach ($tables as $newTable => $oldTable) {
            if (Schema::hasTable($newTable) && ! Schema::hasTable($oldTable)) {
                Schema::rename($newTable, $oldTable);
            }
        }
    }
};
