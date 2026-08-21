<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HostingProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\HostingProfile::updateOrCreate(
            ['name' => 'Demo cPanel Server'],
            [
                'panel_type' => 'cpanel',
                'hostname' => 'cpanel.example.com',
                'port' => 2083,
                'cpanel_username' => 'cpanel_user',
                'api_token' => 'CPANEL_DUMMY_TOKEN_XXXXXXXXXXXXX',
                'public_html_path' => 'public_html',
                'db_prefix' => 'cpaneluser',
                'is_active' => true,
            ]
        );

        \App\Models\HostingProfile::updateOrCreate(
            ['name' => 'Demo DirectAdmin Server'],
            [
                'panel_type' => 'directadmin',
                'hostname' => 'da.example.com',
                'port' => 2222,
                'cpanel_username' => 'da_user', // Vẫn dùng chung trường username cho DA
                'api_token' => 'DA_DUMMY_TOKEN_XXXXXXXXXXXXX',
                'public_html_path' => 'public_html',
                'db_prefix' => 'dauser',
                'is_active' => true,
            ]
        );
    }
}
