@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">{{ $portfolioProject->title }}</h1>
    
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Categoría</label>
            <p class="text-gray-900">{{ $portfolioProject->category->name ?? 'N/A' }}</p>
        </div>
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Descripción</label>
            <p class="text-gray-900">{{ $portfolioProject->description }}</p>
        </div>
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Imagen de Portada</label>
            @if($portfolioProject->cover_image_path)
                <img src="{{ asset('storage/' . $portfolioProject->cover_image_path) }}" alt="{{ $portfolioProject->title }}" class="w-64 h-48 object-cover rounded">
            @else
                <p class="text-gray-500">Sin imagen</p>
            @endif
        </div>
        
        <div class="flex space-x-3 mt-6">
            <a href="{{ route('portfolio-projects.edit', $portfolioProject) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                Editar
            </a>
            <a href="{{ route('portfolio-projects.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Volver a la Lista
            </a>
        </div>
    </div>
</div>
@endsection