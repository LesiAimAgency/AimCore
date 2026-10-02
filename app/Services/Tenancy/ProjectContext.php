<?php

declare(strict_types=1);

namespace App\Services\Tenancy;

use App\Models\Project;
use App\Models\Tenant;

class ProjectContext
{
    private ?Project $project = null;

    private ?Tenant $tenant = null;

    private ?string $theme = null;

    private ?string $connection = null;

    public function setProject(Project $project): void
    {
        $this->project = $project;
        $this->tenant = $project->tenant;

        // Share to views globally
        view()->share('currentProject', $project);
        view()->share('currentTenant', $this->tenant);

        // Bind to service container
        app()->instance('current_project', $project);
        app()->instance('current_project_id', $project->id);

        $tenantId = $project->tenant_id ?? $this->tenant?->id ?? $project->id;
        app()->instance('current_tenant_id', $tenantId);
        config(['app.current_tenant_id' => $tenantId]);

        if (session()) {
            session(['current_project_id' => $project->id]);
            session(['current_project_code' => $project->code]);
            session(['current_tenant_id' => $tenantId]);
        }
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function getTenant(): ?Tenant
    {
        return $this->tenant;
    }

    public function getProjectId(): ?int
    {
        return $this->project?->id;
    }

    public function getTenantId(): ?int
    {
        return $this->project?->tenant_id ?? $this->tenant?->id ?? $this->project?->id;
    }

    public function setTheme(string $theme): void
    {
        $this->theme = $theme;
        view()->share('activeTheme', $theme);
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setConnection(string $connection): void
    {
        $this->connection = $connection;
    }

    public function getConnection(): ?string
    {
        return $this->connection;
    }

    public function clear(): void
    {
        $this->project = null;
        $this->tenant = null;
        $this->theme = null;
        $this->connection = null;
    }
}
