@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Galerías de Clientes</h1>
    
    <a href="{{ route('client-galleries.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        Añadir Nueva Galería
    </a>
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="min-w-full bg-white border border-gray-300">
        <thead class="bg-gray-50">
            <tr>
                <th class="py-2 px-4 border-b">Título</th>
                <th class="py-2 px-4 border-b">Fecha del Evento</th>
                <th class="py-2 px-4 border-b">Portada</th>
                <th class="py-2 px-4 border-b">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($galleries as $gallery)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $gallery->title }}</td>
                    <td class="py-2 px-4 border-b">{{ $gallery->event_date ?? 'N/A' }}</td>
                    <td class="py-2 px-4 border-b">
                        @if($gallery->cover_image_path)
                            <img src="{{ Storage::url($gallery->cover_image_path) }}" alt="{{ $gallery->title }}" class="w-16 h-16 object-cover rounded">
                        @else
                            <span class="text-gray-500">Sin imagen</span>
                        @endif
                    </td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('client-galleries.edit', $gallery) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-3 rounded text-sm mr-2">Editar</a>
                        <form action="{{ route('client-galleries.destroy', $gallery) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded text-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="py-2 px-4 border-b text-center">No hay galerías disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    {{ $galleries->links() }}
</div>
@endsection