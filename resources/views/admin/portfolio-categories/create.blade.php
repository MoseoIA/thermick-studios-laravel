@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Añadir Nueva Categoría</h1>
    
    <form action="{{ route('portfolio-categories.store') }}" method="POST" class="max-w-md">
        @csrf
        
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror" 
                   required>
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex justify-end">
            <a href="{{ route('portfolio-categories.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                Cancelar
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection