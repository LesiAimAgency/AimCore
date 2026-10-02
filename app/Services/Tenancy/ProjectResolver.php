<?php

declare(strict_types=1);

namespace App\Services\Tenancy;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectResolver
{
    /**
     * Resolve the active Project from HTTP Request (Domain, Subdomain, Path, Header)
     */
    public function resolve(Request $request): ?Project
    {
        $host = $request->getHost();

        // 1. Resolve by Domain or External Domain (e.g. ehenho.local, ehenho.vn, wkcomputer.aimagency.vn)
        $project = Project::where('external_domain', $host)
            ->orWhere('subdomain', 'like', "%://{$host}%")
            ->orWhere('subdomain', $host)
            ->first();

        if ($project) {
            return $project;
        }

        // 2. Resolve by Subdomain prefix (e.g. ehenho.domain.com -> 'ehenho')
        $subdomainParts = explode('.', $host);
        if (count($subdomainParts) > 2) {
            $subdomain = $subdomainParts[0];
            $project = Project::where('code', $subdomain)->first();
            if ($project) {
                return $project;
            }
        }

        // 3. Resolve by Route Parameter {projectCode}
        $projectCode = $request->route('projectCode');
        if ($projectCode && ! str_contains($projectCode, '{') && ! str_contains($projectCode, '}')) {
            $project = Project::where('code', $projectCode)->first();
            if ($project) {
                return $project;
            }
        }

        // 4. Resolve by first URI path segment (e.g. /ehenho/..., /wkcomputer/...)
        $firstSegment = $request->segment(1);
        if ($firstSegment && ! in_array($firstSegment, ['superadmin', 'admin', 'api', 'build', 'vendor', 'livewire', 'flux', 'storage'])) {
            $project = Project::where('code', $firstSegment)->first();
            if ($project) {
                return $project;
            }
        }

        // 5. Fallback Header (for API / internal calls)
        $headerCode = $request->header('X-Project-Code');
        if ($headerCode) {
            $project = Project::where('code', $headerCode)->first();
            if ($project) {
                return $project;
            }
        }

        return null;
    }
}
