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
            ProjectSeeder::class,
            WebsiteConfigSeeder::class,
            InbetweenThemeSeeder::class,
            InbetweenHomepageMainSeeder::class,
            ViettinmartMasterSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
