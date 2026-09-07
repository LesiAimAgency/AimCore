<?php

namespace Tests\Feature;

use App\Models\FormSubmission;
use App\Models\Project;
use App\Models\User;
use App\Models\Widget;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MultisiteTenantIsolationTest extends TestCase
{
    use RefreshDatabase;

    protected Project $vtmProject;

    protected Project $wkProject;

    protected User $vtmAdmin;

    protected User $wkAdmin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->vtmProject = Project::create([
            'name' => 'VietTinMart',
            'code' => 'viettinmart-eco',
            'status' => 'active',
            'project_type' => 'website',
        ]);

        $this->wkProject = Project::create([
            'name' => 'WKComputer Gaming & PC',
            'code' => 'wkcomputer',
            'status' => 'active',
            'project_type' => 'website',
        ]);

        $this->vtmAdmin = User::factory()->create([
            'username' => 'vtm_admin',
            'email' => 'admin@viettinmart.local',
            'role' => 'admin',
            'project_ids' => [$this->vtmProject->id],
        ]);

        $this->wkAdmin = User::factory()->create([
            'username' => 'wk_admin',
            'email' => 'admin@wkcomputer.local',
            'role' => 'admin',
            'project_ids' => [$this->wkProject->id],
        ]);
    }

    public function test_wk_admin_cannot_access_vtm_admin_area(): void
    {
        $response = $this->withSession([
            'project_user_id' => $this->wkAdmin->id,
            'project_user_username' => $this->wkAdmin->username,
            'current_project' => 'viettinmart-eco',
        ])->get('/viettinmart-eco/admin');

        $this->assertTrue(in_array($response->getStatusCode(), [403, 302]));
    }

    public function test_vtm_admin_cannot_access_wk_admin_area(): void
    {
        $response = $this->withSession([
            'project_user_id' => $this->vtmAdmin->id,
            'project_user_username' => $this->vtmAdmin->username,
            'current_project' => 'wkcomputer',
        ])->get('/wkcomputer/admin');

        $this->assertTrue(in_array($response->getStatusCode(), [403, 302]));
    }

    public function test_form_submissions_are_strictly_isolated_by_project(): void
    {
        $subWk = FormSubmission::create([
            'project_id' => $this->wkProject->id,
            'tenant_id' => 4,
            'form_name' => 'Liên hệ',
            'data' => ['name' => 'WK Customer', 'email' => 'customer@wk.local'],
            'status' => 'pending',
            'source' => 'contact',
        ]);

        $subVtm = FormSubmission::create([
            'project_id' => $this->vtmProject->id,
            'tenant_id' => 3,
            'form_name' => 'Liên hệ',
            'data' => ['name' => 'VTM Customer', 'email' => 'customer@vtm.local'],
            'status' => 'pending',
            'source' => 'contact',
        ]);

        // When scoped to WK project
        request()->attributes->set('project', $this->wkProject);
        $wkList = FormSubmission::all();
        $this->assertTrue($wkList->contains('id', $subWk->id));
        $this->assertFalse($wkList->contains('id', $subVtm->id));

        // When scoped to VTM project
        request()->attributes->set('project', $this->vtmProject);
        $vtmList = FormSubmission::all();
        $this->assertTrue($vtmList->contains('id', $subVtm->id));
        $this->assertFalse($vtmList->contains('id', $subWk->id));
    }

    public function test_widgets_are_isolated_and_scoped_to_tenants(): void
    {
        $wkWgt = Widget::create([
            'project_id' => $this->wkProject->id,
            'tenant_id' => 4,
            'name' => 'WK Hero Slider',
            'type' => 'vtm_hero',
            'area' => 'homepage-main',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $vtmWgt = Widget::create([
            'project_id' => $this->vtmProject->id,
            'tenant_id' => 3,
            'name' => 'VTM Hero Slider',
            'type' => 'vtm_hero',
            'area' => 'homepage-main',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        request()->attributes->set('project', $this->wkProject);
        $wkWidgets = Widget::all();
        $this->assertTrue($wkWidgets->contains('id', $wkWgt->id));
        $this->assertFalse($wkWidgets->contains('id', $vtmWgt->id));

        request()->attributes->set('project', $this->vtmProject);
        $vtmWidgets = Widget::all();
        $this->assertTrue($vtmWidgets->contains('id', $vtmWgt->id));
        $this->assertFalse($vtmWidgets->contains('id', $wkWgt->id));
    }
}
