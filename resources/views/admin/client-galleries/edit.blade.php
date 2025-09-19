@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Editar Galería</h1>
        <a href="{{ route('client-galleries.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            Volver a Lista
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Gallery Details Form -->
    <form action="{{ route('client-galleries.update', $clientGallery) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-6 mb-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Título</label>
                <input type="text" name="title" id="title" value="{{ old('title', $clientGallery->title) }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror" 
                       required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="event_date" class="block text-sm font-medium text-gray-700 mb-2">Fecha del Evento (opcional)</label>
                <input type="date" name="event_date" id="event_date" value="{{ old('event_date', $clientGallery->event_date) }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('event_date') border-red-500 @enderror">
                @error('event_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
                <input type="password" name="password" id="password" value="{{ old('password') }}" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('password') border-red-500 @enderror" 
                       required>
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="cover_image" class="block text-sm font-medium text-gray-700 mb-2">Imagen de Portada (opcional)</label>
                <input type="file" name="cover_image" id="cover_image" accept="image/*" 
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('cover_image') border-red-500 @enderror">
                @error('cover_image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                @if($clientGallery->cover_image_path)
                    <img src="{{ Storage::url($clientGallery->cover_image_path) }}" alt="Cover" class="w-32 h-32 object-cover mt-2 rounded">
                @endif
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Actualizar Galería
            </button>
        </div>
    </form>

    <!-- Gallery Items Management -->
    <h2 class="text-2xl font-bold mb-6">Elementos de la Galería</h2>

    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h3 class="text-lg font-semibold mb-4">Agregar Foto</h3>
        <form action="{{ route('client-galleries.update', $clientGallery) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @csrf
            <input type="hidden" name="action" value="add_photo">
            <input type="file" name="photo" id="photo" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Agregar Foto
            </button>
        </form>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h3 class="text-lg font-semibold mb-4">Agregar Video</h3>
        <form action="{{ route('client-galleries.update', $clientGallery) }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @csrf
            <input type="hidden" name="action" value="add_video">
            <input type="url" name="video_url" id="video_url" placeholder="URL de Google Drive" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Agregar Video
            </button>
        </form>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-semibold mb-4">Elementos Actuales</h3>
        @if($clientGallery->items->count() > 0)
            <div class="space-y-4">
                @foreach($clientGallery->items as $item)
                    <div class="flex items-center space-x-4 p-4 border rounded">
                        @if($item->type === 'photo')
                            <img src="{{ Storage::url($item->path_or_url) }}" alt="Foto" class="w-20 h-20 object-cover rounded">
                            <div class="flex-1">
                                <p>Foto #{{ $loop->iteration }}</p>
                            </div>
                        @else
                            <div class="flex-1">
                                <p>Video: {{ $item->path_or_url }}</p>
                            </div>
                        @endif
                        <form action="{{ route('client-galleries.update', $clientGallery) }}" method="POST" class="inline">
                            @csrf
                            <input type="hidden" name="action" value="delete_item">
                            <input type="hidden" name="item_id" value="{{ $item->id }}">
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded text-sm" onclick="return confirm('¿Estás seguro de eliminar este elemento?')">
                                Eliminar
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500">No hay elementos en esta galería.</p>
        @endif
    </div>
</div>
@endsection