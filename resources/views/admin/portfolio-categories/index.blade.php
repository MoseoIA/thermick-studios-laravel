@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Categorías del Portafolio</h1>
    
    <a href="{{ route('portfolio-categories.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        Añadir Nueva Categoría
    </a>
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="min-w-full bg-white border border-gray-300">
        <thead class="bg-gray-50">
            <tr>
                <th class="py-2 px-4 border-b">Nombre</th>
                <th class="py-2 px-4 border-b">Slug</th>
                <th class="py-2 px-4 border-b">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $category->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $category->slug }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('portfolio-categories.edit', $category) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-3 rounded text-sm mr-2">Editar</a>
                        <form action="{{ route('portfolio-categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded text-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="py-2 px-4 border-b text-center">No hay categorías disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    {{ $categories->links() }}
</div>
@endsection