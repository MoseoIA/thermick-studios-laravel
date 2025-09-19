<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = PortfolioProject::with('images')->take(4)->get();
        $testimonials = Testimonial::latest()->take(3)->get();

        return view('public.home', compact('featuredProjects', 'testimonials'));
    }
}