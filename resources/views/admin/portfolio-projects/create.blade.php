@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Añadir Nuevo Proyecto</h1>
    
    <form action="{{ route('portfolio-projects.store') }}" method="POST" enctype="multipart/form-data" class="max-w-2xl">
        @csrf
        
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Título</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror" 
                   required>
            @error('title')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('slug') border-red-500 @enderror">
            @error('slug')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Descripción</label>
            <textarea name="description" id="description" rows="4" 
                      class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Categoría</label>
            <select name="category_id" id="category_id" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('category_id') border-red-500 @enderror" 
                    required>
                <option value="">Seleccionar Categoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-6">
            <label for="cover_image" class="block text-sm font-medium text-gray-700 mb-2">Imagen de Portada</label>
            <input type="file" name="cover_image" id="cover_image" accept="image/*" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('cover_image') border-red-500 @enderror" 
                   required>
            @error('cover_image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex justify-end space-x-3">
            <a href="{{ route('portfolio-projects.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Cancelar
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection