<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $this->call([
            CmsSystemSeeder::class,
            CmsAdminDataSeeder::class,
            EcommerceSeeder::class,
            InbetweenThemeSeeder::class,
            InbetweenHomepageMainSeeder::class,
            InbetweenV2WidgetsSeeder::class,
            ViettinmartMasterSeeder::class,
            WkcomputerMasterSeeder::class,
            EhenhoMasterSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
