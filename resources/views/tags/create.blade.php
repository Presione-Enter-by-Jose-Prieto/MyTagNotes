@extends('layout.app')
@section('title', 'Crear Nueva Etiqueta')

@section('content')
    <h1 class="text-center text-2xl font-semibold mb-2">Crea una nueva etiqueta</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="rounded-xl border mb-4 p-3 flex flex-col bg-gray-100 border-gray-300">
        <form action="{{ route('tags.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block font-semibold mb-1">Nombre de la Etiqueta</label>
                <input 
                    type="text" id="name" name="name" required
                    class="w-full border border-gray-300 bg-white text-sm p-2 rounded-md focus:outline-none focus:ring-0 focus:border-gray-300"
                    value="{{ old('name') }}"
                >
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-row gap-2 justify-end">
                <x-boton-gris href="{{ route('notes.index') }}">Cancelar</x-boton-gris>
                <x-boton-azul type="submit">Guardar Etiqueta</x-boton-azul>
            </div>
        </form>
    </div>

    <div>
        <h2 class="text-xl font-semibold mt-6 mb-4">Etiquetas Existentes:</h2>

        <div class="space-y-3">
            @foreach ($tags as $tag)
                <div class="rounded-xl border mb-4 px-3 py-2 flex flex-row justify-between items-center bg-gray-100
                     border-gray-300">
                    <div class="flex items-center gap-3">
                        <span class="inline-flex items-center gap-1 text-gray-600 text-sm font-medium">
                            {{ $tag->name }}
                        </span>
                        <small class="text-gray-500 text-xs">({{ $tag->notes_count ?? $tag->notes->count() }})</small>
                    </div>

                    <div class="flex flex-row gap-2">
                        <x-boton-gris href="{{ route('tags.edit', $tag->id) }}">Editar</x-boton-gris>
                        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" onsubmit="return confirm('Eliminar etiqueta?');">
                            @csrf
                            @method('DELETE')
                            <x-boton-rojo type="submit">Eliminar</x-boton-rojo>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection