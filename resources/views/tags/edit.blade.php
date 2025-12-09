@extends('layout.app')
@section('title', 'Editar '. $tag->name)

@section('content')
    <h1 class="text-center text-2xl font-semibold mb-2">Editar: {{ $tag->name }}</h1>

    <div class="rounded-xl border mb-4 p-3 flex flex-col bg-gray-100 border-gray-300">
        <form action="{{ route('tags.update', $tag->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block font-semibold mb-1">Nombre de la Etiqueta</label>
                <input 
                    type="text" id="name" name="name" required
                    value="{{ old('name', $tag->name) }}"
                    class="w-full border border-gray-300 bg-white text-sm p-2 rounded-md focus:outline-none focus:ring-0 focus:border-gray-300"
                >
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-row gap-2 justify-end">
                <x-boton-gris href="{{ route('tags.create') }}">Cancelar</x-boton-gris>
                <x-boton-azul type="submit">Guardar Etiqueta</x-boton-azul>
            </div>
        </form>
    </div>
@endsection