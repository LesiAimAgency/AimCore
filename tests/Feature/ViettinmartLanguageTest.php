<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViettinmartLanguageTest extends TestCase
{
    use RefreshDatabase;

    protected Project $project;

    protected function setUp(): void
    {
        parent::setUp();

        Tenant::forceCreate([
            'id' => 3,
            'name' => 'VietTinMart',
            'code' => 'viettinmart-eco',
            'domain' => 'viettinmart.local',
            'database_name' => 'fukkatsu_Animcore',
        ]);

        $this->project = Project::firstOrCreate(
            ['code' => 'viettinmart-eco'],
            [
                'name' => 'VietTinMart',
                'status' => 'active',
                'project_type' => 'website',
                'tenant_id' => 3,
                'domain' => 'viettinmart-eco.aimagency.vn',
            ]
        );
    }

    public function test_accessing_viettinmart_home_in_vietnamese()
    {
        $response = $this->get('/viettinmart-eco');
        $this->assertTrue(in_array($response->getStatusCode(), [200, 302]));
    }

    public function test_accessing_viettinmart_home_in_english()
    {
        $response = $this->get('/viettinmart-eco/en');
        dump('Status for /viettinmart-eco/en: '.$response->getStatusCode());
        $this->assertEquals(200, $response->getStatusCode());
    }
}
