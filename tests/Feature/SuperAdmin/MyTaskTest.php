<?php

namespace Tests\Feature\SuperAdmin;

use App\Models\Contract;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class MyTaskTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Config::set('database.connections.project', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    /** Create a superadmin user (level=0). */
    private function superAdmin(): User
    {
        return User::factory()->create([
            'level' => 0,
            'role' => 'super_admin',
            'department' => 'Quản trị hệ thống',
        ]);
    }

    /** Create a PM user (level=1). */
    private function pmUser(): User
    {
        return User::factory()->create([
            'level' => 1,
            'role' => 'project_manager',
            'department' => 'Quản lý dự án',
        ]);
    }

    /** Create a designer user (level=2). */
    private function designerUser(): User
    {
        return User::factory()->create([
            'level' => 2,
            'role' => 'designer',
            'department' => 'Thiết kế',
        ]);
    }

    /** Create a web dev user (level=2). */
    private function webDevUser(): User
    {
        return User::factory()->create([
            'level' => 2,
            'role' => 'developer',
            'department' => 'Thiết kế website',
        ]);
    }

    /** Create an active project. */
    private function project(): Project
    {
        $contract = Contract::create([
            'title' => 'Test Contract',
            'client_name' => 'Test Client',
            'service_type' => 'website',
            'status' => 'active',
        ]);

        return Project::create([
            'name' => 'Test Project '.uniqid(),
            'code' => 'TEST-'.rand(1000, 9999),
            'contract_id' => $contract->id,
            'status' => 'active',
        ]);
    }

    /** Create a pending task. */
    private function pendingTask(User $user, Project $project, array $overrides = []): Task
    {
        return Task::factory()->create(array_merge([
            'user_id' => $user->id,
            'assigned_to' => $user->id,
            'project_id' => $project->id,
            'start_date' => today(),
            'deadline' => today()->addDays(5),
            'status' => 'todo',
            'priority' => 'medium',
            'approval_status' => 'approved',
            'acceptance_status' => 'accepted',
            'position' => 1,
        ], $overrides));
    }

    public function test_my_tasks_index_is_accessible(): void
    {
        $user = $this->superAdmin();

        $this->actingAs($user)
            ->get(route('superadmin.my-tasks.index'))
            ->assertOk()
            ->assertViewIs('superadmin.my-tasks.index');
    }

    public function test_store_creates_task_with_assignment_and_priority(): void
    {
        $pm = $this->pmUser();
        $designer = $this->designerUser();
        $project = $this->project();

        $response = $this->actingAs($pm)
            ->postJson(route('superadmin.my-tasks.store'), [
                'title' => 'Thiết kế Logo Banner',
                'description' => 'Mô tả thiết kế logo',
                'project_id' => $project->id,
                'assigned_to' => $designer->id,
                'priority' => 'urgent',
                'start_date' => today()->toDateString(),
                'deadline' => today()->addDays(3)->toDateString(),
            ])
            ->assertOk()
            ->assertJson(['success' => true]);

        $task = Task::where('title', 'Thiết kế Logo Banner')->first();
        $this->assertNotNull($task);
        $this->assertEquals($designer->id, $task->assigned_to);
        $this->assertEquals('urgent', $task->priority);
        $this->assertEquals('approved', $task->approval_status); // PM created -> auto approved
        $this->assertEquals('pending', $task->acceptance_status); // Assigned to another -> pending acceptance
    }

    public function test_only_managers_can_set_and_update_gold(): void
    {
        $pm = $this->pmUser();
        $designer = $this->designerUser();
        $project = $this->project();

        // 1. Nhân sự tạo task và cố tình gửi gold=500 -> Bị force về 0
        $this->actingAs($designer)
            ->postJson(route('superadmin.my-tasks.store'), [
                'title' => 'Task nhân sự tự tạo',
                'project_id' => $project->id,
                'gold' => 500,
                'deadline' => today()->addDays(2)->toDateString(),
            ])
            ->assertOk()
            ->assertJson(['success' => true]);

        $task = Task::where('title', 'Task nhân sự tự tạo')->first();
        $this->assertEquals(0, $task->gold);

        // 2. Quản lý dự án sửa task và gán 200 Gold -> Thành công
        $this->actingAs($pm)
            ->putJson(route('superadmin.my-tasks.update', $task), [
                'title' => 'Task nhân sự tự tạo (Đã duyệt Gold)',
                'project_id' => $project->id,
                'gold' => 200,
                'deadline' => today()->addDays(2)->toDateString(),
            ])
            ->assertOk()
            ->assertJson(['success' => true]);

        $this->assertEquals(200, $task->fresh()->gold);

        // 3. Nhân sự sửa task và cố tình tăng lên 999 Gold -> Không thay đổi, vẫn là 200
        $this->actingAs($designer)
            ->putJson(route('superadmin.my-tasks.update', $task), [
                'title' => 'Task nhân sự cập nhật lại title',
                'project_id' => $project->id,
                'gold' => 999,
                'deadline' => today()->addDays(2)->toDateString(),
            ])
            ->assertOk()
            ->assertJson(['success' => true]);

        $this->assertEquals(200, $task->fresh()->gold);
    }

    public function test_admin_or_pm_can_approve_task(): void
    {
        $admin = $this->superAdmin();
        $designer = $this->designerUser();
        $project = $this->project();

        $task = Task::factory()->create([
            'user_id' => $designer->id,
            'assigned_to' => $designer->id,
            'project_id' => $project->id,
            'title' => 'Task cần duyệt',
            'approval_status' => 'pending',
            'status' => 'todo',
        ]);

        $this->actingAs($admin)
            ->patchJson(route('superadmin.my-tasks.approve', $task))
            ->assertOk()
            ->assertJson(['success' => true]);

        $this->assertEquals('approved', $task->fresh()->approval_status);
    }

    public function test_admin_can_reject_task_approval(): void
    {
        $admin = $this->superAdmin();
        $designer = $this->designerUser();
        $project = $this->project();

        $task = Task::factory()->create([
            'user_id' => $designer->id,
            'assigned_to' => $designer->id,
            'project_id' => $project->id,
            'title' => 'Task bị từ chối duyệt',
            'approval_status' => 'pending',
            'status' => 'todo',
        ]);

        $this->actingAs($admin)
            ->patchJson(route('superadmin.my-tasks.reject-approval', $task), [
                'reason' => 'Không đủ thông tin yêu cầu',
            ])
            ->assertOk()
            ->assertJson(['success' => true]);

        $fresh = $task->fresh();
        $this->assertEquals('rejected', $fresh->approval_status);
        $this->assertEquals('Không đủ thông tin yêu cầu', $fresh->rejection_reason);
    }

    public function test_assignee_can_accept_task(): void
    {
        $pm = $this->pmUser();
        $designer = $this->designerUser();
        $project = $this->project();

        $task = Task::factory()->create([
            'user_id' => $pm->id,
            'assigned_to' => $designer->id,
            'project_id' => $project->id,
            'title' => 'Task giao cho Designer',
            'approval_status' => 'approved',
            'acceptance_status' => 'pending',
            'status' => 'todo',
        ]);

        $this->actingAs($designer)
            ->patchJson(route('superadmin.my-tasks.accept', $task))
            ->assertOk()
            ->assertJson(['success' => true]);

        $fresh = $task->fresh();
        $this->assertEquals('accepted', $fresh->acceptance_status);
        $this->assertEquals('in_progress', $fresh->status);
    }

    public function test_assignee_can_decline_task(): void
    {
        $pm = $this->pmUser();
        $designer = $this->designerUser();
        $project = $this->project();

        $task = Task::factory()->create([
            'user_id' => $pm->id,
            'assigned_to' => $designer->id,
            'project_id' => $project->id,
            'title' => 'Task Designer bận không nhận',
            'approval_status' => 'approved',
            'acceptance_status' => 'pending',
            'status' => 'todo',
        ]);

        $this->actingAs($designer)
            ->patchJson(route('superadmin.my-tasks.decline', $task), [
                'reason' => 'Đang quá tải công việc dự án khác',
            ])
            ->assertOk()
            ->assertJson(['success' => true]);

        $fresh = $task->fresh();
        $this->assertEquals('rejected', $fresh->acceptance_status);
        $this->assertEquals('Đang quá tải công việc dự án khác', $fresh->rejection_reason);
    }

    public function test_complete_and_restore_task(): void
    {
        $admin = $this->superAdmin();
        $project = $this->project();
        $task = $this->pendingTask($admin, $project);

        // Complete
        $this->actingAs($admin)
            ->patchJson(route('superadmin.my-tasks.complete', $task))
            ->assertOk()
            ->assertJson(['success' => true]);

        $this->assertNotNull($task->fresh()->completed_at);

        // Restore
        $this->actingAs($admin)
            ->patchJson(route('superadmin.my-tasks.restore', $task))
            ->assertOk()
            ->assertJson(['success' => true]);

        $this->assertNull($task->fresh()->completed_at);
    }

    public function test_complete_requires_manager_approval_to_award_gold(): void
    {
        $pm = $this->pmUser();
        $designer = $this->designerUser();
        $project = $this->project();

        $initialGold = $designer->gold;

        $task = Task::factory()->create([
            'user_id' => $pm->id,
            'assigned_to' => $designer->id,
            'project_id' => $project->id,
            'title' => 'Task có thưởng Gold',
            'gold' => 150,
            'gold_awarded' => false,
            'approval_status' => 'approved',
            'acceptance_status' => 'accepted',
            'status' => 'in_progress',
        ]);

        // 1. Nhân sự bấm báo cáo hoàn thành -> Đánh dấu completed nhưng CHƯA cộng gold (gold_awarded = false)
        $this->actingAs($designer)
            ->patchJson(route('superadmin.my-tasks.complete', $task))
            ->assertOk()
            ->assertJson([
                'success' => true,
                'gold_amount' => 150,
                'gold_awarded' => false,
            ]);

        $freshTask = $task->fresh();
        $this->assertNotNull($freshTask->completed_at);
        $this->assertFalse($freshTask->gold_awarded);
        $this->assertEquals($initialGold, $designer->fresh()->gold); // Chưa cộng gold!

        // 2. Nhân sự thường không thể tự duyệt trao gold cho mình
        $this->actingAs($designer)
            ->patchJson(route('superadmin.my-tasks.approve-gold', $task))
            ->assertStatus(403);

        // 3. Quản lý dự án (PM) duyệt nghiệm thu -> Cộng +150 Gold cho nhân sự
        $this->actingAs($pm)
            ->patchJson(route('superadmin.my-tasks.approve-gold', $task))
            ->assertOk()
            ->assertJson([
                'success' => true,
                'gold_amount' => 150,
                'gold_awarded' => true,
            ]);

        $this->assertTrue($task->fresh()->gold_awarded);
        $this->assertEquals($initialGold + 150, $designer->fresh()->gold);

        // 4. Khôi phục task -> Thu hồi lại 150 Gold
        $this->actingAs($pm)
            ->patchJson(route('superadmin.my-tasks.restore', $task))
            ->assertOk()
            ->assertJson(['success' => true]);

        $this->assertFalse($task->fresh()->gold_awarded);
        $this->assertEquals($initialGold, $designer->fresh()->gold);
    }

    public function test_reorder_updates_positions_in_database(): void
    {
        $admin = $this->superAdmin();
        $project = $this->project();

        $t1 = $this->pendingTask($admin, $project, ['position' => 1]);
        $t2 = $this->pendingTask($admin, $project, ['position' => 2]);

        $this->actingAs($admin)
            ->postJson(route('superadmin.my-tasks.reorder'), [
                'items' => [$t2->id, $t1->id],
            ])
            ->assertOk()
            ->assertJson(['success' => true]);

        $this->assertEquals(1, $t2->fresh()->position);
        $this->assertEquals(2, $t1->fresh()->position);
    }

    public function test_sync_endpoint_returns_realtime_data_and_last_change(): void
    {
        $pm = $this->pmUser();
        $designer = $this->designerUser();
        $project = $this->project();

        $t1 = $this->pendingTask($pm, $project, ['assigned_to' => $designer->id, 'position' => 1]);
        $t2 = $this->pendingTask($pm, $project, ['assigned_to' => $designer->id, 'position' => 2]);

        // PM reorder
        $this->actingAs($pm)
            ->postJson(route('superadmin.my-tasks.reorder'), [
                'items' => [$t2->id, $t1->id],
            ])
            ->assertOk();

        // 1. Designer calls sync endpoint with v=0 -> Nhận dữ liệu thay đổi
        $response = $this->actingAs($designer)
            ->getJson(route('superadmin.my-tasks.sync', ['v' => 0]))
            ->assertOk()
            ->assertJson([
                'success' => true,
                'has_changed' => true,
            ]);

        $json = $response->json();
        $this->assertEquals('reorder', $json['last_change']['action']);
        $this->assertEquals($pm->id, $json['last_change']['user_id']);
        $this->assertCount(2, $json['pendingTasks']);
        $this->assertEquals($t2->id, $json['pendingTasks'][0]['id']);

        $serverVersion = $json['server_version'];

        // 2. Designer tiếp tục poll với version hiện tại -> Trả về has_changed=false từ RAM Cache, 0 DB query!
        $this->actingAs($designer)
            ->getJson(route('superadmin.my-tasks.sync', ['v' => $serverVersion]))
            ->assertOk()
            ->assertJson([
                'success' => true,
                'has_changed' => false,
                'server_version' => $serverVersion,
            ]);
    }

    public function test_non_manager_cannot_delegate_task_to_others(): void
    {
        $designer = $this->designerUser();
        $otherUser = $this->webDevUser();
        $project = $this->project();

        // Designer cố tình gửi assigned_to = otherUser
        $response = $this->actingAs($designer)
            ->postJson(route('superadmin.my-tasks.store'), [
                'title' => 'Task cá nhân của Designer',
                'project_id' => $project->id,
                'assigned_to' => $otherUser->id,
                'deadline' => now()->addDays(2)->toDateString(),
            ])
            ->assertOk();

        $task = Task::latest('id')->first();
        // Backend tự động gán cho chính Designer
        $this->assertEquals($designer->id, $task->assigned_to);
        $this->assertEquals('accepted', $task->acceptance_status);
    }

    public function test_pm_can_reassign_rejected_task_to_another_user(): void
    {
        $pm = $this->pmUser();
        $designer = $this->designerUser();
        $webDev = $this->webDevUser();
        $project = $this->project();

        // 1. Task ban đầu giao cho designer
        $task = $this->pendingTask($pm, $project, [
            'assigned_to' => $designer->id,
            'acceptance_status' => 'pending',
        ]);

        // 2. Designer từ chối nhận việc
        $this->actingAs($designer)
            ->patchJson(route('superadmin.my-tasks.decline', $task->id), [
                'reason' => 'Đang bận dự án khác',
            ])
            ->assertOk();

        $this->assertEquals('rejected', $task->fresh()->acceptance_status);
        $this->assertEquals('Đang bận dự án khác', $task->fresh()->rejection_reason);

        // 3. PM điều phối lại cho WebDev
        $this->actingAs($pm)
            ->patchJson(route('superadmin.my-tasks.reassign', $task->id), [
                'assigned_to' => $webDev->id,
            ])
            ->assertOk()
            ->assertJson([
                'success' => true,
            ]);

        $refreshed = $task->fresh();
        $this->assertEquals($webDev->id, $refreshed->assigned_to);
        $this->assertEquals('pending', $refreshed->acceptance_status);
        $this->assertEquals('approved', $refreshed->approval_status);
        $this->assertNull($refreshed->rejection_reason);

        // 4. Non-manager không thể reassign
        $this->actingAs($designer)
            ->patchJson(route('superadmin.my-tasks.reassign', $task->id), [
                'assigned_to' => $designer->id,
            ])
            ->assertForbidden();
    }

    public function test_store_rejects_past_dates(): void
    {
        $pm = $this->pmUser();
        $project = $this->project();

        // 1. Deadline trong quá khứ -> 422
        $this->actingAs($pm)
            ->postJson(route('superadmin.my-tasks.store'), [
                'title' => 'Task với deadline quá khứ',
                'project_id' => $project->id,
                'deadline' => today()->subDays(1)->toDateString(),
            ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['deadline']);

        // 2. Start date trong quá khứ -> 422
        $this->actingAs($pm)
            ->postJson(route('superadmin.my-tasks.store'), [
                'title' => 'Task với start_date quá khứ',
                'project_id' => $project->id,
                'start_date' => today()->subDays(2)->toDateString(),
                'deadline' => today()->addDays(2)->toDateString(),
            ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['start_date']);

        // 3. Deadline trước start_date -> 422
        $this->actingAs($pm)
            ->postJson(route('superadmin.my-tasks.store'), [
                'title' => 'Task với deadline < start_date',
                'project_id' => $project->id,
                'start_date' => today()->addDays(5)->toDateString(),
                'deadline' => today()->addDays(2)->toDateString(),
            ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['deadline']);
    }

    public function test_stream_returns_event_stream_response(): void
    {
        $pm = $this->pmUser();

        $response = $this->actingAs($pm)
            ->get(route('superadmin.my-tasks.stream', ['last_version' => 0]));

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertStringContainsString('text/event-stream', $response->headers->get('Content-Type'));
    }
}
