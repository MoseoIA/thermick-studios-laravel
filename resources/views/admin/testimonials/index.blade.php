@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Gestionar Testimonios</h1>
    
    <a href="{{ route('testimonials.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        Añadir Nuevo Testimonio
    </a>
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="min-w-full bg-white border border-gray-300">
        <thead class="bg-gray-50">
            <tr>
                <th class="py-2 px-4 border-b">Nombre del Cliente</th>
                <th class="py-2 px-4 border-b">Cita</th>
                <th class="py-2 px-4 border-b">Tipo de Evento</th>
                <th class="py-2 px-4 border-b">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($testimonials as $testimonial)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $testimonial->client_name }}</td>
                    <td class="py-2 px-4 border-b">{{ Str::limit($testimonial->quote, 100) }}</td>
                    <td class="py-2 px-4 border-b">{{ $testimonial->event_type ?? 'N/A' }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('testimonials.edit', $testimonial) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-3 rounded text-sm mr-2">Editar</a>
                        <form action="{{ route('testimonials.destroy', $testimonial) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded text-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="py-2 px-4 border-b text-center">No hay testimonios disponibles.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    
    {{ $testimonials->links() }}
</div>
@endsection