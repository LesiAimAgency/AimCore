<?php

namespace App\Http\Controllers\Viettinmart;

use App\Http\Controllers\Themes\InbetweenV2\InbetweenV2Controller;

class HomeController extends Controller
{
    public function index()
    {
        $project = function_exists('current_project') ? current_project() : null;
        $projectCode = strtoupper($project?->code ?? request()->route('projectCode') ?? '');

        if ($projectCode === 'DA005' || setting('theme') === 'inbetween_v2') {
            return app(InbetweenV2Controller::class)->index();
        }

        if ($projectCode === 'DA010' || setting('theme') === 'ehenho') {
            return redirect('/DA010');
        }

        $theme = setting('theme');

        if ($theme && view()->exists("frontend.themes.{$theme}.home")) {
            return view("frontend.themes.{$theme}.home");
        }

        if ($theme && view()->exists("frontend.themes.{$theme}.index")) {
            return view("frontend.themes.{$theme}.index");
        }

        if (view()->exists('frontend.themes.viettinmartdemo.index')) {
            return view('frontend.themes.viettinmartdemo.index');
        }

        return view('index');
    }
}
