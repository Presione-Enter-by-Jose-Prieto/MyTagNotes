@extends('layout.app')
@section('title', 'Editar '. $note->title)
@section('content')

<h1 class="text-2xl font-bold mb-4">Editar Nota</h1>

<form action="{{ route('notes.update', $note) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- Título --}}
    <div class="mb-4">
        <label class="block font-semibold">Título</label>
        <input 
            type="text" 
            name="title" 
            value="{{ old('title', $note->title) }}"
            class="w-full border p-2 rounded"
        >

        @error('title')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    {{-- Contenido --}}
    <div class="mb-4">
        <label class="block font-semibold">Contenido</label>
        <textarea 
            name="content" 
            rows="5" 
            class="w-full border p-2 rounded"
        >{{ old('content', $note->content) }}</textarea>

        @error('content')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    {{-- Etiquetas --}}
    <div class="mb-4">
        <label class="block font-semibold mb-2">Etiquetas</label>

        @foreach ($tags as $tag)
            <label class="inline-flex items-center mr-4">
                <input 
                    type="checkbox" 
                    name="tags[]" 
                    value="{{ $tag->id }}"
                    {{ in_array($tag->id, old('tags', $note->tags->pluck('id')->toArray())) ? 'checked' : '' }}
                >
                <span class="ml-1">{{ $tag->name }}</span>
            </label>
        @endforeach

        @error('tags')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex justify-end gap-2">
        <x-boton-gris href="{{ route('notes.index') }}">Cancelar</x-boton-gris>
        <x-boton-rojo type="submit">Actualizar Nota</x-boton-rojo>
    </div>
</form>

@endsection