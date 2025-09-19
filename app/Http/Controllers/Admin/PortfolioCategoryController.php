<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = PortfolioCategory::latest()->paginate(10);
        return view('admin.portfolio-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolio-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:portfolio_categories,slug',
        ]);

        PortfolioCategory::create([
            'name' => $request->name,
            'slug' => $request->slug ?: Str::slug($request->name),
        ]);

        return redirect()->route('portfolio-categories.index')->with('success', 'Categoría creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PortfolioCategory $portfolioCategory)
    {
        $portfolioCategory->load('projects');
        return view('admin.portfolio-categories.show', compact('portfolioCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PortfolioCategory $portfolioCategory)
    {
        return view('admin.portfolio-categories.edit', compact('portfolioCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PortfolioCategory $portfolioCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:portfolio_categories,slug,' . $portfolioCategory->id,
        ]);

        $portfolioCategory->update([
            'name' => $request->name,
            'slug' => $request->slug ?: Str::slug($request->name),
        ]);

        return redirect()->route('portfolio-categories.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PortfolioCategory $portfolioCategory)
    {
        $portfolioCategory->delete();
        return redirect()->route('portfolio-categories.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
