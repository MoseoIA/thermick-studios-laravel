@extends('layouts.public')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-serif font-bold text-center mb-8">Área de Clientes</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($galleries as $gallery)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if($gallery->cover_image_path)
                    <img src="{{ Storage::url($gallery->cover_image_path) }}" alt="{{ $gallery->title }}" class="w-full h-48 object-cover">
                @endif
                <div class="p-4">
                    <h2 class="text-xl font-serif font-semibold mb-2">{{ $gallery->title }}</h2>
                    <p class="text-light-text mb-4">{{ $gallery->event_date ? $gallery->event_date->format('d/m/Y') : 'Fecha no especificada' }}</p>
                    <a href="{{ route('client.gallery.password', $gallery->slug) }}" class="bg-accent hover:bg-accent-dark text-primary px-4 py-2 rounded-md font-semibold">
                        Acceder a Galería
                    </a>
                </div>
            </div>
        @empty
            <div class="text-center py-8">
                <p class="text-light-text">No hay galerías disponibles.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection