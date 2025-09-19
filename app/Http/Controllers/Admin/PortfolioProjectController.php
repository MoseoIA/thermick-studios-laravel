<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use App\Models\PortfolioProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioProjectController extends Controller
{
    public function index()
    {
        $projects = PortfolioProject::with('category')->latest()->paginate(10);
        return view('admin.portfolio-projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = PortfolioCategory::all();
        return view('admin.portfolio-projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'portfolio_category_id' => 'required|exists:portfolio_categories,id',
            'description' => 'nullable|string',
            'cover_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = $request->file('cover_image')->store('portfolio_covers', 'public');

        PortfolioProject::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'portfolio_category_id' => $validated['portfolio_category_id'],
            'description' => $validated['description'],
            'cover_image_path' => $imagePath,
        ]);

        return redirect()->route('portfolio-projects.index')->with('success', 'Proyecto creado exitosamente.');
    }

    public function edit(PortfolioProject $portfolioProject)
    {
        $categories = PortfolioCategory::all();
        return view('admin.portfolio-projects.edit', compact('portfolioProject', 'categories'));
    }

    public function update(Request $request, PortfolioProject $portfolioProject)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'portfolio_category_id' => 'required|exists:portfolio_categories,id',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = $portfolioProject->cover_image_path;
        if ($request->hasFile('cover_image')) {
            // Delete old image
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            // Store new image
            $imagePath = $request->file('cover_image')->store('portfolio_covers', 'public');
        }

        $portfolioProject->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'portfolio_category_id' => $validated['portfolio_category_id'],
            'description' => $validated['description'],
            'cover_image_path' => $imagePath,
        ]);

        return redirect()->route('portfolio-projects.index')->with('success', 'Proyecto actualizado exitosamente.');
    }

    public function destroy(PortfolioProject $portfolioProject)
    {
        if ($portfolioProject->cover_image_path) {
            Storage::disk('public')->delete($portfolioProject->cover_image_path);
        }
        $portfolioProject->delete();
        return redirect()->route('portfolio-projects.index')->with('success', 'Proyecto eliminado exitosamente.');
    }
}
