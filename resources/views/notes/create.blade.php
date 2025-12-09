@extends('layout.app')
@section('title', 'Crear Nueva Nota')

@section('content')
    <h1 class="text-center text-2xl font-semibold mb-2">Crea una nueva nota</h1>

    <div class="rounded-xl border mb-4 p-3 flex flex-col bg-gray-100 border-gray-300">
        <form action="{{ route('notes.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="title" class="block font-semibold mb-1">Título</label>
                <input 
                    type="text" id="title" name="title" required
                    value="{{ old('title') }}"
                    class="w-full border border-gray-300 bg-white text-sm p-2 rounded-md focus:outline-none focus:ring-0 focus:border-gray-300"
                >

                @error('title')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="content" class="block font-semibold mb-1">Contenido</label>
                <textarea 
                    id="content" name="content" rows="6" required
                    class="w-full border border-gray-300 bg-white text-sm p-2 rounded-md leading-relaxed whitespace-pre-line resize-y focus:outline-none focus:ring-0 focus:border-gray-300"
                >{{ old('content') }}</textarea>

                @error('content')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-semibold mb-2">Etiquetas</label>
                <div class="flex flex-wrap gap-2">
                    @foreach ($tags as $tag)
                        <label class="inline-flex items-center">
                            <input 
                                type="checkbox" 
                                name="tags[]" 
                                value="{{ $tag->id }}"
                                class="sr-only peer"
                                {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                            >
                            <span class="inline-flex items-center gap-1 bg-gray-200 text-gray-700 text-xs px-2 py-0.5 rounded-full border border-gray-300 font-medium leading-none peer-checked:bg-gray-700 peer-checked:text-white peer-checked:border-gray-700">
                                {{ $tag->name }}
                            </span>
                        </label>
                    @endforeach
                </div>

                @error('tags')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-row gap-2 justify-end">
                <x-boton-gris href="{{ route('notes.index') }}">Cancelar</x-boton-gris>
                <x-boton-naranja type="submit">Guardar Nota</x-boton-naranja>
            </div>
        </form>
    </div>
@endsection