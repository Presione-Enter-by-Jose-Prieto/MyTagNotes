@extends('layout.app')
@section('title', 'Crear Nueva Etiqueta')

@section('content')
    <h1 class="text-center text-2xl font-semibold mb-2">Crea una nueva etiqueta</h1>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="box-border">
        <form action="{{ route('tags.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block font-bold mb-2">Nombre de la Etiqueta:</label>
                <input 
                 type="text" id="name" name="name" required
                 class="border rounded focus:outline-none px-2 py-1 w-full"
                >
            </div>
            <div class="flex flex-row gap-2 justify-end">
                <x-boton-gris href="{{ route('notes.index') }}">Cancelar</x-boton-gris>
                <x-boton-azul type="submit">Guardar Etiqueta</x-boton-azul>
            </div>
        </form>
    </div>
    <div>
        <h2 class="text-xl font-semibold mt-6 mb-4">Etiquetas Existentes:</h2>
        <ul class="flex flex-col mt-3">
            @foreach ($tags as $tag)
                <li class="flex flex-row justify-between mb-3 text-gray-300">
                    {{$tag->name}}
                    <div class="flex flex-row gap-3">
                        <x-boton-azul href="{{ route('tags.edit', $tag->id) }}">Editar</x-boton-azul>
                        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <x-boton-rojo type="submit">Eliminar</x-boton-rojo>
                        </form>
                    </div>

                </li>
            @endforeach
        </ul>
    </div>
@endsection