@extends('layout.app')
@section('title', 'Welcome to MyTagNotes')

@section('content')
    <h1 class="text-center text-2xl font-semibold mb-2">Notas</h1>
    <div class="flex justify-center items-center gap-2 mb-6">
        <x-boton-gris href="{{ route('tags.create') }}">Ver Etiquetas</x-boton-gris>
        <x-boton-azul href="{{ route('notes.create') }}">Crear Nota</x-boton-azul>
    </div>
    @if( session('success') )
        <div class="bg-green-500 text-white font-bold rounded-lg mb-4 p-4 text-center">
            {{ session('success') }}
        </div>
    @endif
    <div>
        <ul>
            @forelse ($notes as $note)
                <a href="{{ route('notes.show', $note) }}">
                    <li 
                     class="rounded-xl border mb-4 px-3 py-2 flex flex-row justify-between items-center bg-gray-100
                     border-gray-300"
                    >
                        <div class="flex gap-3">
                            <div class="text-gray-400">
                                <strong class="text-gray-600">{{ $note->title }}</strong> - {{ $note->created_at->isoFormat('LL') }}
                            </div>
                        </div>
                        <div class="flex flex-row gap-2">
                            <x-boton-gris href="{{ route('notes.edit', $note) }}">Editar</x-boton-gris>
                            <form action="{{ route('notes.destroy', $note) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-boton-rojo type="submit">Eliminar</x-boton-rojo>
                            </form>
                        </div>
                    </li>
                </a>
            @empty
                <li class="text-center">No hay notas disponibles.</li>
            @endforelse
        </ul>
    </div>
@endsection