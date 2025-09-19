@extends('layouts.public')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto">
        <h1 class="text-3xl font-bold mb-6">Acceso a Galería</h1>
        
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">{{ $gallery->title }}</h2>
            <p class="text-gray-600 mb-6">Ingresa la contraseña para ver la galería.</p>
            
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <p class="text-sm">{{ $errors->first('password') }}</p>
                </div>
            @endif
            
            <form action="{{ route('client.gallery.show', $gallery->slug) }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                    <input type="password" name="password" id="password" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div class="flex justify-between">
                    <a href="{{ route('client.portal') }}" class="text-blue-600 hover:text-blue-700">Cancelar</a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-semibold">
                        Acceder
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection