@extends('layout.app')
@section('title', 'Crear Nueva Nota')

@section('content')
    <h1 class="text-center text-2xl font-semibold mb-2">Crea una nueva nota</h1>
    <div class="box-border">
        <form action="{{ route('notes.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block font-bold mb-2">Título:</label>
                <input 
                 type="text" id="title" name="title" required
                 class="border rounded focus:outline-none px-2 py-1 w-full"
                >
            </div>
            <div class="mb-4">
                <label for="content" class="block font-bold mb-2">Contenido:</label>
                <textarea 
                 id="content" name="content" rows="5" required
                 class="border rounded focus:outline-none px-2 py-1 w-full"
                ></textarea>
            </div>
            <div class="mb-4">
                <label for="content" class="block font-bold mb-2">Contenido:</label>
                @foreach ($tags as $tag)
                    <input 
                        type="checkbox" 
                        name="tags[]" 
                        value="{{ $tag->id }}"
                    >{{ $tag->name }}
                @endforeach
            </div>
            <div class="flex flex-row gap-2 justify-end">
                <x-boton-gris href="{{ route('notes.index') }}">Cancelar</x-boton-gris>
                <x-boton-verde type="submit">Guardar Nota</x-boton-verde>
            </div>
        </form>
    </div>
@endsection