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

        $newestProfiles = Profile::where('status', 'active')
            ->orderByDesc('is_featured')
            ->latest()
            ->take(12)
            ->get();

        $provinces = Province::orderBy('name')->get();

        $recentFemaleProfiles = Profile::where('status', 'active')
            ->where('gender', 'female')
            ->latest()
            ->take(5)
            ->get();

        $recentMaleProfiles = Profile::where('status', 'active')
            ->where('gender', 'male')
            ->latest()
            ->take(5)
            ->get();

        return view('themes.ehenho.pages.home', compact(
            'featuredProfiles',
            'newestProfiles',
            'provinces',
            'recentFemaleProfiles',
            'recentMaleProfiles'
        ));
    }
}
