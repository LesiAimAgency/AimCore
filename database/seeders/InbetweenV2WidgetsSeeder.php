<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Widget;
use Illuminate\Database\Seeder;

class InbetweenV2WidgetsSeeder extends Seeder
{
    public function run(?int $projectId = null, ?int $tenantId = null): void
    {
        $widgets = [
            1 => [
                'name' => '1. Hero Section',
                'type' => 'inbetween_v2_hero',
                'settings' => [
                    'headline_text' => "YOUR LOCAL TEAM BEFORE YOU'RE READY TO HIRE ONE.",
                    'intro_subtitle' => 'Your business is',
                    'intro_title' => 'ENTERING VIETNAM?',
                    'cta_text' => 'Talk to us',
                    'cta_link' => '#inbetween-founder',
                ],
            ],
            2 => [
                'name' => '2. What We Do',
                'type' => 'inbetween_v2_what_we_do',
                'settings' => [
                    'title_line1' => 'Flexible local support,',
                    'title_line2' => 'built around what you need.',
                    'description' => '<strong class="font-semibold text-[#131313]">Tell us what you want to achieve.</strong> We\'ll help you identify the right next steps and level of local support.',
                    'cta_text' => 'Talk to us',
                    'cta_link' => '#inbetween-founder',
                ],
            ],
            3 => [
                'name' => '3. Where We Focus',
                'type' => 'inbetween_v2_where_we_focus',
                'settings' => [
                    'heading_line1' => 'Our core business sectors',
                    'heading_line2' => 'Where we create values',
                ],
            ],
            4 => [
                'name' => '4. Founder Profile',
                'type' => 'inbetween_v2_founder',
                'settings' => [
                    'founder_name' => 'AIRU',
                    'founder_role' => 'Founder of INBETWEEN',
                    'experience_years' => '14+',
                    'quote_line1' => 'Built between cultures.',
                    'quote_line2' => 'Connected across borders.',
                ],
            ],
            5 => [
                'name' => '5. Our Clients',
                'type' => 'inbetween_v2_our_clients',
                'settings' => [
                    'heading_word1' => 'OUR',
                    'heading_word2' => 'CLIENTS.',
                ],
            ],
            6 => [
                'name' => '6. Beyond Business',
                'type' => 'inbetween_v2_business',
                'settings' => [
                    'heading_prefix' => 'Building ',
                    'heading_suffix' => 'more than a service.',
                    'description' => 'In Between Asia is also building a <strong class="font-semibold text-[#131313]">growing media platform, business network </strong>connecting people, ideas and opportunities across Asia.',
                    'cta_text' => 'Talk to us',
                    'cta_link' => '#inbetween-founder',
                ],
            ],
        ];

        // Delete all existing widgets in area inbetween_v2
        Widget::withoutGlobalScopes()->where('area', 'inbetween_v2')->delete();

        $project = $projectId ? Project::withoutGlobalScopes()->find($projectId) : Project::withoutGlobalScopes()->first();
        $targetProjId = $project?->id ?? 17;
        $targetTenantId = $project?->tenant_id ?? $targetProjId;

        foreach ($widgets as $order => $widget) {
            Widget::withoutGlobalScopes()->create([
                'project_id' => $targetProjId,
                'tenant_id' => $targetTenantId,
                'area' => 'inbetween_v2',
                'name' => $widget['name'],
                'type' => $widget['type'],
                'is_active' => true,
                'sort_order' => $order,
                'settings' => $widget['settings'],
            ]);
        }

        $this->command?->info('INBETWEEN V2 widgets seeded successfully (6 sections, 6 widgets).');
    }
}
