@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Editar Testimonio</h1>
    
    <form action="{{ route('testimonials.update', $testimonial) }}" method="POST" class="max-w-md">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="client_name" class="block text-sm font-medium text-gray-700 mb-2">Nombre del Cliente</label>
            <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $testimonial->client_name) }}" 
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
                      required>{{ old('quote', $testimonial->quote) }}</textarea>
            @error('quote')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-6">
            <label for="event_type" class="block text-sm font-medium text-gray-700 mb-2">Tipo de Evento (opcional)</label>
            <input type="text" name="event_type" id="event_type" value="{{ old('event_type', $testimonial->event_type) }}" 
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
                Actualizar
            </button>
        </div>
    </form>
</div>
@endsection