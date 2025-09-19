@extends('layouts.public')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-serif font-bold mb-6">{{ $gallery->title }}</h1>
        <p class="text-light-text mb-8">{{ $gallery->event_date ? $gallery->event_date->format('d/m/Y') : 'Fecha no especificada' }}</p>
        
        <div class="columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">
            @foreach ($items as $item)
                @if ($item->type == 'photo')
                    <a href="{{ Storage::url($item->path_or_url) }}" class="glightbox" data-gallery="client-gallery">
                        <img src="{{ Storage::url($item->path_or_url) }}" alt="Foto de la galería" class="rounded-lg shadow-md w-full h-auto block">
                    </a>
                @elseif ($item->type == 'video' && $item->embed_url)
                    <a href="{{ $item->embed_url }}" class="glightbox" data-gallery="client-gallery" data-type="iframe" data-width="900" data-height="506">
                        {{-- This is a simple visual placeholder for the video --}}
                        <div class="relative rounded-lg shadow-md overflow-hidden aspect-video bg-secondary">
                            <img src="{{ $gallery->cover_image_path ? Storage::url($gallery->cover_image_path) : 'https://via.placeholder.com/400x225.png/111111/C9A959?text=Video' }}" alt="Video Thumbnail" class="w-full h-full object-cover opacity-50">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg class="w-16 h-16 text-light-text opacity-75" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"></path></svg>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
<script>
    const lightbox = GLightbox({
        selector: '.glightbox',
        touchNavigation: true,
        loop: true,
        autoplayVideos: true
    });
</script>
@endpush
@endsection