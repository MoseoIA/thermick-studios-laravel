@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Editar Proyecto</h1>
    
    <form action="{{ route('portfolio-projects.update', $portfolioProject) }}" method="POST" enctype="multipart/form-data" class="max-w-2xl">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Título</label>
            <input type="text" name="title" id="title" value="{{ old('title', $portfolioProject->title) }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror" 
                   required>
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Descripción</label>
            <textarea name="description" id="description" rows="4" 
                      class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror">{{ old('description', $portfolioProject->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="portfolio_category_id" class="block text-sm font-medium text-gray-700 mb-2">Categoría</label>
            <select name="portfolio_category_id" id="portfolio_category_id" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('portfolio_category_id') border-red-500 @enderror" 
                    required>
                <option value="">Seleccionar Categoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('portfolio_category_id', $portfolioProject->portfolio_category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('portfolio_category_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-6">
            <label for="cover_image" class="block text-sm font-medium text-gray-700 mb-2">Imagen de Portada</label>
            @if($portfolioProject->cover_image_path)
                <div class="mb-2">
                    <img src="{{ Storage::url($portfolioProject->cover_image_path) }}" alt="{{ $portfolioProject->title }}" class="w-32 h-32 object-cover rounded">
                </div>
            @endif
            <input type="file" name="cover_image" id="cover_image" accept="image/*" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('cover_image') border-red-500 @enderror">
            @error('cover_image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex justify-end space-x-3">
            <a href="{{ route('portfolio-projects.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Cancelar
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Actualizar
            </button>
        </div>
    </form>
</div>
@endsection