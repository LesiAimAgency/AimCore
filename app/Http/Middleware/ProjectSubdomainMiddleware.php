<?php

namespace App\Http\Middleware;

use App\Models\Project;
use App\Models\Tenant;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\Response;

class ProjectSubdomainMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $projectCode = $request->route('projectCode');

        // Block placeholder URLs
        if ($projectCode && (str_contains($projectCode, '{') || str_contains($projectCode, '}'))) {
            abort(404, 'Invalid project code format');
        }

        if ($projectCode) {
            $project = Project::where('code', $projectCode)->first();
        } else {
            // For exported standalone projects where {projectCode} is removed from routes
            $project = Project::first();
        }

        if (! $project) {
            abort(404, 'Project not found'.($projectCode ? ': '.$projectCode : ''));
        }

        $hasTenantCol = false;
        try {
            $hasTenantCol = Schema::hasColumn('projects', 'tenant_id');
        } catch (\Throwable $e) {
            $hasTenantCol = false;
        }

        $tenantId = $hasTenantCol ? $project->tenant_id : null;
        if (! $tenantId) {
            $matchedTenant = Tenant::where('code', $project->code)
                ->orWhere('code', str_replace(['-eco', '-ecommerce', '-demo'], '', $project->code))
                ->first();
            $tenantId = $matchedTenant?->id;
            if ($tenantId && $hasTenantCol) {
                try {
                    $project->update(['tenant_id' => $tenantId]);
                } catch (\Throwable $e) {
                    // Fallback gracefully if database table is not migrated yet
                }
            }
        }

        view()->share('currentProject', $project);
        $request->attributes->set('project', $project);
        app()->instance('current_project_id', $project->id);
        if ($tenantId) {
            app()->instance('current_tenant_id', $tenantId);
            config(['app.current_tenant_id' => $tenantId]);
            config(['app.default_tenant_id' => $tenantId]);
        }
        if (session()) {
            session(['current_project_id' => $project->id]);
            session(['current_project' => $project]);
            if ($tenantId) {
                session(['current_tenant_id' => $tenantId]);
            }
        }

        // Prepend active project's theme view path so project theme templates/layouts take precedence
        $theme = ($project->features['theme'] ?? null) ?: ($project->code === 'viettinmart-eco' ? 'viettinmartdemo' : setting('theme'));
        if ($theme) {
            $themeViewPath = resource_path("views/frontend/themes/{$theme}");
            if (is_dir($themeViewPath)) {
                view()->getFinder()->prependLocation($themeViewPath);
            }
        }

        // Ensure active locale is set for the project
        $sessionLocale = session('locale');
        if ($sessionLocale) {
            app()->setLocale(trim($sessionLocale));
        } else {
            $languages = setting('languages', []);
            if (is_string($languages)) {
                $languages = json_decode($languages, true) ?: [];
            }
            $defaultLocale = collect($languages)->firstWhere('is_default', true)['code'] ?? config('app.locale', 'vi');
            app()->setLocale(trim($defaultLocale) ?: 'vi');
        }

        return $next($request);
    }

    private function ensureProjectHasCmsUser($project)
    {
        // Check if project already has a CMS user
        $existingUser = User::where('username', $project->code)
            ->where('role', 'cms')
            ->first();

        if (! $existingUser) {
            try {
                // Create CMS user for existing project
                $user = User::create([
                    'name' => 'Admin - '.$project->code,
                    'username' => $project->code,
                    'email' => strtolower($project->code).'@project.local',
                    'password' => bcrypt($project->project_admin_password ?? 'admin123'),
                    'role' => 'cms',
                    'level' => 2,
                    'email_verified_at' => now(),
                ]);

                \Log::info('Created CMS user for existing project: '.$project->code);

                return $user;
            } catch (\Exception $e) {
                \Log::error('Failed to create CMS user for project '.$project->code.': '.$e->getMessage());
            }
        }

        return $existingUser;
    }
}
