<?php

declare(strict_types=1);

namespace App\Http\Controllers\Themes\Ehenho;

use App\Http\Controllers\Controller;
use App\Models\Ehenho\Profile;
use App\Models\Ehenho\Province;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request): View
    {
        $query = Profile::where('status', 'active');

        if ($request->filled('gender') && $request->input('gender') !== 'all') {
            $query->where('gender', $request->input('gender'));
        }

        if ($request->filled('age_min')) {
            $query->where('age', '>=', (int) $request->input('age_min'));
        }

        if ($request->filled('age_max')) {
            $query->where('age', '<=', (int) $request->input('age_max'));
        }

        if ($request->filled('province')) {
            $query->where('province_id', $request->input('province'));
        }

        if ($request->filled('marital_status')) {
            $query->where('marital_status', 'like', '%'.$request->input('marital_status').'%');
        }

        if ($request->filled('looking_for')) {
            $query->where('looking_for', 'like', '%'.$request->input('looking_for').'%');
        }

        $profiles = $query->latest()->paginate(16)->withQueryString();
        $provinces = Province::orderBy('name')->get();

        return view('themes.ehenho.pages.search.index', compact('profiles', 'provinces'));
    }

    public function byAge(Request $request, ?string $age = null): View
    {
        $query = Profile::where('status', 'active');

        if ($age) {
            if (str_contains($age, '-')) {
                [$min, $max] = explode('-', $age);
                $query->whereBetween('age', [(int) $min, (int) $max]);
            } else {
                $query->where('age', (int) $age);
            }
        } elseif ($request->filled('age_min') || $request->filled('age_max')) {
            if ($request->filled('age_min')) {
                $query->where('age', '>=', (int) $request->input('age_min'));
            }
            if ($request->filled('age_max')) {
                $query->where('age', '<=', (int) $request->input('age_max'));
            }
        }

        $profiles = $query->latest()->paginate(16)->withQueryString();
        $provinces = Province::orderBy('name')->get();

        return view('themes.ehenho.pages.search.by_age', compact('profiles', 'provinces', 'age'));
    }
}
