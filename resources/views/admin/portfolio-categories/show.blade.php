@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">{{ $portfolioCategory->name }}</h1>
    
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
            <p class="text-gray-900">{{ $portfolioCategory->slug }}</p>
        </div>
        
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Proyectos</label>
            @if($portfolioCategory->projects->count() > 0)
                <ul class="list-disc list-inside">
                    @foreach($portfolioCategory->projects as $project)
                        <li>{{ $project->title }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No hay proyectos en esta categoría.</p>
            @endif
        </div>
        
        <div class="flex space-x-3 mt-6">
            <a href="{{ route('portfolio-categories.edit', $portfolioCategory) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                Editar
            </a>
            <a href="{{ route('portfolio-categories.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Volver a la Lista
            </a>
        </div>
    </div>
</div>
@endsection