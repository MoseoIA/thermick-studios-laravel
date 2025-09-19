@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Añadir Nuevo Testimonio</h1>
    
    <form action="{{ route('testimonials.store') }}" method="POST" class="max-w-md">
        @csrf
        
        <div class="mb-4">
            <label for="client_name" class="block text-sm font-medium text-gray-700 mb-2">Nombre del Cliente</label>
            <input type="text" name="client_name" id="client_name" value="{{ old('client_name') }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('client_name') border-red-500 @enderror" 
                   required>
            @error('client_name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <label for="quote" class="block text-sm font-medium text-gray-700 mb-2">Cita</label>
            <textarea name="quote" id="quote" rows="4" 
                      class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('quote') border-red-500 @enderror" 
                      required>{{ old('quote') }}</textarea>
            @error('quote')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-6">
            <label for="event_type" class="block text-sm font-medium text-gray-700 mb-2">Tipo de Evento (opcional)</label>
            <input type="text" name="event_type" id="event_type" value="{{ old('event_type') }}" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('event_type') border-red-500 @enderror">
            @error('event_type')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex justify-end space-x-3">
            <a href="{{ route('testimonials.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Cancelar
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection