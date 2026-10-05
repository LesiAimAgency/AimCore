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
        // 1. Resolve by first URI path segment (e.g. /ehenho, /wkcomputer, /viettinmart-eco)
        $firstSegment = $request->segment(1);
        if ($firstSegment && ! in_array($firstSegment, ['superadmin', 'admin', 'api', 'build', 'vendor', 'livewire', 'flux', 'storage'])) {
            $project = Project::where('code', $firstSegment)->first();
            if ($project) {
                return $project;
            }

            if (in_array(strtoupper($firstSegment), ['EHENHO', 'DA010', 'DA010-EHENHO-DATING-SOCIAL-NETWORK'])) {
                $project = Project::where('code', 'DA010-EHENHO-DATING-SOCIAL-NETWORK')
                    ->orWhere('code', 'ehenho')
                    ->first();
                if ($project) {
                    return $project;
                }
            }
        }

        // 2. Resolve by Route Parameter {projectCode}
        $projectCode = $request->route('projectCode');
        if ($projectCode && ! str_contains($projectCode, '{') && ! str_contains($projectCode, '}')) {
            $project = Project::where('code', $projectCode)->first();
            if ($project) {
                return $project;
            }

            if (in_array(strtoupper($projectCode), ['EHENHO', 'DA010', 'DA010-EHENHO-DATING-SOCIAL-NETWORK'])) {
                $project = Project::where('code', 'DA010-EHENHO-DATING-SOCIAL-NETWORK')
                    ->orWhere('code', 'ehenho')
                    ->first();
                if ($project) {
                    return $project;
                }
            }
        }

        $host = $request->getHost();

        // 3. Resolve by Domain or External Domain (excluding localhost wildcard)
        if (! in_array($host, ['127.0.0.1', 'localhost'])) {
            $project = Project::where('external_domain', $host)
                ->orWhere('subdomain', 'like', "%://{$host}%")
                ->orWhere('subdomain', $host)
                ->first();

            if ($project) {
                return $project;
            }

            // 4. Resolve by Subdomain prefix (e.g. ehenho.domain.com -> 'ehenho')
            $subdomainParts = explode('.', $host);
            if (count($subdomainParts) > 2) {
                $subdomain = $subdomainParts[0];
                $project = Project::where('code', $subdomain)->first();
                if ($project) {
                    return $project;
                }
            }
        } else {
            $project = Project::where('external_domain', $host)->first();
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
