@extends('layout.app')
@section('title', 'Editar '. $note->title)
@section('content')

    <h1 class="text-center text-2xl font-semibold mb-2">{{ 'Editar ' . $note->title }}</h1>

    <div class="rounded-xl border mb-4 p-3 flex flex-col bg-gray-100 border-gray-300">
        <form action="{{ route('notes.update', $note) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Título --}}
            <div>
                <label class="block font-semibold mb-1">Título</label>
                <input 
                    type="text" 
                    name="title" 
                    value="{{ old('title', $note->title) }}"
                    class="w-full border border-gray-300 bg-white text-sm p-2 rounded-md focus:outline-none focus:ring-0 focus:border-gray-300"
                >

                @error('title')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Contenido --}}
            <div>
                <label class="block font-semibold mb-1">Contenido</label>
                <textarea 
                    name="content" 
                    rows="6" 
                    class="w-full border border-gray-300 bg-white text-sm p-2 rounded-md leading-relaxed whitespace-pre-line resize-y focus:outline-none focus:ring-0 focus:border-gray-300"
                >{{ old('content', $note->content) }}</textarea>

                @error('content')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Etiquetas --}}
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
                                {{ in_array($tag->id, old('tags', $note->tags->pluck('id')->toArray())) ? 'checked' : '' }}
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

            <div class="flex justify-end gap-2">
                <x-boton-gris href="{{ route('notes.index') }}">Cancelar</x-boton-gris>
                <x-boton-rojo type="submit">Actualizar Nota</x-boton-rojo>
            </div>
        </form>
    </div>

@endsection