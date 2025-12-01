@extends('layout.app')
@section('title', 'Crear Nueva Etiqueta')

@section('content')
    <h1 class="text-center text-2xl font-semibold mb-2">Crea una nueva etiqueta</h1>
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
                <x-boton-verde type="submit">Guardar Etiqueta</x-boton-verde>
            </div>
        </form>
    </div>
@endsection