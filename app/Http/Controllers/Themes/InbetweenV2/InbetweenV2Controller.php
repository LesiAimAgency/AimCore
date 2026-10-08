<?php

declare(strict_types=1);

namespace App\Http\Controllers\Themes\InbetweenV2;

use App\Core\Theme\ThemeManager;
use App\Http\Controllers\Controller;
use App\Models\FormSubmission;
use App\Models\Project;
use App\Models\Widget;
use Database\Seeders\InbetweenV2WidgetsSeeder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class InbetweenV2Controller extends Controller
{
    public function index(Request $request): View
    {
        $themeManager = app(ThemeManager::class);
        $themeManager->setActiveTheme('inbetween_v2');

        $project = function_exists('current_project') ? current_project() : null;

        // Auto-seed widgets for inbetween_v2 area if none exist yet
        $hasWidgets = Widget::withoutGlobalScope('tenant')
            ->where('area', 'inbetween_v2')
            ->exists();

        if (! $hasWidgets && class_exists(InbetweenV2WidgetsSeeder::class)) {
            try {
                $projId = $project?->id;
                $tenantId = $project?->tenant_id ?? $projId;
                (new InbetweenV2WidgetsSeeder)->run($projId, $tenantId);
            } catch (\Throwable $e) {
                Log::warning('InbetweenV2WidgetsSeeder auto-seed failed: '.$e->getMessage());
            }
        }

        return view('themes.inbetween_v2.pages.home', [
            'project' => $project,
        ]);
    }

    public function contact(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'nullable|email|max:255',
            'service' => 'nullable|string|max:100',
            'message' => 'nullable|string',
        ]);

        try {
            if (Schema::hasTable('form_submissions')) {
                $project = function_exists('current_project') ? current_project() : null;
                if (! $project) {
                    $project = Project::where('code', 'inbetween_v2')->first();
                }
                $projId = $project?->id ?? 16;
                $tenantId = $project?->tenant_id ?? $projId;

                $inputData = array_merge($validated, $request->except(['_token', 'fullname', 'phone', 'email', 'service', 'message']));

                FormSubmission::create([
                    'form_name' => 'inbetween_v2_contact_modal',
                    'data' => $inputData,
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'project_id' => $projId,
                    'tenant_id' => $tenantId,
                    'status' => 'pending',
                    'source' => 'modal',
                    'submitted_at' => now(),
                ]);
            }
        } catch (\Throwable $e) {
            Log::warning('Inbetween V2 contact form DB save skipped: '.$e->getMessage());
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Thank you! Your inquiry has been sent successfully.',
        ]);
    }
}
