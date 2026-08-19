<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;

class TaskPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::first(); 
        $project = Project::first(); 
        
        $titles = ['thiết kế LDP', 'LDP', 'sửa CRM', '2'];

        foreach ($titles as $index => $title) {
            Task::create([
                'title' => $title,
                'description' => 'Mô tả cho ' . $title,
                'status' => 'todo',
                'priority' => 'high',
                'user_id' => $admin->id ?? 1,
                'assigned_to' => $admin->id ?? 1,
                'project_id' => $project->id ?? null,
                'position' => $index + 1,
                'gold' => 10,
                'deadline' => now()->addDays(1)
            ]);
        }
    }
}
