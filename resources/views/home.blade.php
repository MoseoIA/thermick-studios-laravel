@extends('layouts.public')

@section('content')
<!-- Hero Section -->
<section class="min-h-screen flex items-center justify-center bg-gray-900 text-white px-4">
    <div class="text-center">
        <h1 class="text-5xl font-bold mb-4">Thermick Studios</h1>
        <p class="text-xl mb-8">Capturando momentos inolvidables con pasión y creatividad.</p>
        <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-md font-semibold">Cotizar Evento</a>
    </div>
</section>

<!-- Mini-Portfolio Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Nuestro Trabajo</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($projects as $project)
                <a href="#" class="block text-center">
                    <img src="{{ Storage::url($project->cover_image_path) }}" alt="{{ $project->title }}" class="w-full h-64 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-semibold">{{ $project->title }}</h3>
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- About Me Teaser Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <div>
            <img src="#" alt="About Me" class="w-full h-64 object-cover rounded-lg">
        </div>
        <div>
            <h2 class="text-3xl font-bold mb-4">Sobre Thermick Studios</h2>
            <p class="text-lg text-gray-700">Somos un equipo apasionado por la fotografía, dedicados a capturar tus momentos más importantes con estilo y profesionalismo.</p>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Lo que dicen nuestros clientes</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
                <div class="text-center p-4 border rounded-lg">
                    <p class="text-gray-700 mb-4">"{{ $testimonial->quote }}"</p>
                    <p class="font-semibold text-blue-600">- {{ $testimonial->client_name }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection