<?php

namespace App\Http\Controllers\Viettinmart;

class HomeController extends Controller
{
    public function index()
    {
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
