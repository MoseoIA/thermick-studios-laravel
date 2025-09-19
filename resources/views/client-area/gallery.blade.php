@extends('layouts.public')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-serif font-bold mb-6">{{ $gallery->title }}</h1>
        <p class="text-light-text mb-8">{{ $gallery->event_date ? $gallery->event_date->format('d/m/Y') : 'Fecha no especificada' }}</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @forelse($items as $item)
                @if($item->type === 'photo')
                    <div class="mb-4">
                        <img src="{{ Storage::url($item->path_or_url) }}" alt="Foto" class="w-full h-64 object-cover rounded-lg">
                    </div>
                @elseif($item->type === 'video')
                    <div class="mb-4">
                        <iframe width="100%" height="315" src="{{ str_replace('/view?usp=sharing', '/preview', $item->path_or_url) }}" frameborder="0" allowfullscreen class="rounded-lg"></iframe>
                    </div>
                @endif
            @empty
                <div class="text-center py-8">
                    <p class="text-light-text">No hay elementos en esta galería.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection