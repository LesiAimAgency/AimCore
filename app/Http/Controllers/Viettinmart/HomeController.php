<?php

namespace App\Http\Controllers\Viettinmart;

class HomeController extends Controller
{
    public function index()
    {
        if (view()->exists('frontend.themes.viettinmartdemo.index')) {
            return view('frontend.themes.viettinmartdemo.index');
        }

        return view('index');
    }
}
