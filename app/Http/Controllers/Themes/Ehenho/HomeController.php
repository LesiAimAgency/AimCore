<?php

declare(strict_types=1);

namespace App\Http\Controllers\Themes\Ehenho;

use App\Http\Controllers\Controller;
use App\Models\Ehenho\Profile;
use App\Models\Ehenho\Province;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredProfiles = Profile::where('status', 'active')
            ->where('is_featured', true)
            ->latest()
            ->take(8)
            ->get();

        if ($featuredProfiles->isEmpty()) {
            $featuredProfiles = Profile::where('status', 'active')
                ->latest()
                ->take(8)
                ->get();
        }

        $newestProfiles = Profile::where('status', 'active')
            ->latest()
            ->take(12)
            ->get();

        $provinces = Province::orderBy('name')->get();

        return view('themes.ehenho.pages.home', compact('featuredProfiles', 'newestProfiles', 'provinces'));
    }
}
