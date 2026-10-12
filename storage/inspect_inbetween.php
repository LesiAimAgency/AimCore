<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$project = App\Models\Project::where('code', 'DA005')->first();
echo "Project ID: " . $project->id . PHP_EOL;
echo "Tenant ID: " . $project->tenant_id . PHP_EOL;

$widgets = App\Models\Widget::withoutGlobalScopes()
    ->where(function($q) use ($project) {
        $q->where('project_id', $project->id)
          ->orWhereIn('area', ['homepage-main', 'inbetween_v2']);
    })
    ->get(['id', 'name', 'type', 'area', 'project_id', 'tenant_id']);
echo "Widgets count: " . $widgets->count() . PHP_EOL;
foreach ($widgets as $w) {
    echo " - " . $w->id . " | " . $w->type . " | " . $w->area . " | proj:" . $w->project_id . PHP_EOL;
}

$menus = App\Models\Menu::withoutGlobalScopes()
    ->where(function($q) use ($project) {
        $q->where('project_id', $project->id)
          ->orWhere('slug', 'like', '%inbetween%');
    })
    ->get(['id', 'name', 'slug', 'location', 'project_id']);
echo "Menus count: " . $menus->count() . PHP_EOL;
foreach ($menus as $m) {
    echo " - " . $m->id . " | " . $m->name . " | slug:" . $m->slug . " | loc:" . $m->location . PHP_EOL;
}

$users = App\Models\User::withoutGlobalScopes()
    ->where('username', 'DA005')
    ->orWhere('role', 'admin')
    ->get(['id', 'username', 'email', 'role']);
echo "Users count: " . $users->count() . PHP_EOL;
foreach ($users as $u) {
    echo " - " . $u->id . " | " . $u->username . " | " . $u->email . " | " . $u->role . PHP_EOL;
}
