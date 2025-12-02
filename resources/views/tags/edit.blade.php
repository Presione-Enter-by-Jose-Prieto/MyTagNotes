@extends('layout.app')
@section('title', 'Editar '. $tag->name)

@section('content')
    <h1 class="text-center text-2xl font-semibold mb-2">Editar: {{$tag->name}}</h1>
    <div class="box-border">
        <form action="{{ route('tags.update', $tag->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block font-bold mb-2">Nombre de la Etiqueta:</label>
                <input 
                 type="text" id="name" name="name" required
                 class="border rounded focus:outline-none px-2 py-1 w-full"
                 value="{{ $tag->name }}"
                >
            </div>
            <div class="flex flex-row gap-2 justify-end">
                <x-boton-gris href="{{ route('tags.create') }}">Cancelar</x-boton-gris>
                <x-boton-azul type="submit">Guardar Etiqueta</x-boton-azul>
            </div>
        </form>
    </div>
@endsection