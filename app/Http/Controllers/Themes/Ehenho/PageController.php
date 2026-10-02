<?php

declare(strict_types=1);

namespace App\Http\Controllers\Themes\Ehenho;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        return view('themes.ehenho.pages.about');
    }

    public function terms(): View
    {
        return view('themes.ehenho.pages.terms');
    }

    public function privacy(): View
    {
        return view('themes.ehenho.pages.privacy');
    }
}
