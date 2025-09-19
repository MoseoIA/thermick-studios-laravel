<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects = \App\Models\PortfolioProject::with('category')->latest()->take(3)->get();
        $testimonials = \App\Models\Testimonial::inRandomOrder()->take(3)->get();

        return view('home', compact('projects', 'testimonials'));
    }
}
