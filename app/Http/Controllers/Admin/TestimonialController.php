<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    // Display a listing of the testimonials.
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    // Show the form for creating a new testimonial.
    public function create()
    {
        return view('admin.testimonials.create');
    }

    // Store a newly created testimonial in the database.
    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'quote' => 'required|string',
            'event_type' => 'nullable|string|max:255',
        ]);

        Testimonial::create($request->all());

        return redirect()->route('testimonials.index')->with('success', 'Testimonio creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    // Show the form for editing the specified testimonial.
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    // Update the specified testimonial in the database.
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'quote' => 'required|string',
            'event_type' => 'nullable|string|max:255',
        ]);

        $testimonial->update($request->all());

        return redirect()->route('testimonials.index')->with('success', 'Testimonio actualizado exitosamente.');
    }

    // Remove the specified testimonial from the database.
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('testimonials.index')->with('success', 'Testimonio eliminado exitosamente.');
    }
}
