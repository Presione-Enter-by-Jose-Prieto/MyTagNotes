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
                    <li class="rounded-xl border mb-4 p-2 flex flex-row justify-between items-center">
                        <div class="flex gap-3">
                            <div>
                                <strong>{{ $note->title }}</strong> - {{ $note->created_at->isoFormat('LL') }}
                            </div>
                            <div class="flex flex-row items-center">
                                @foreach($note->tags as $tag)
                                    <span class="inline-block bg-blue-200 text-blue-800 text-xs px-2 py-1 rounded-full mr-2">
                                        {{ $tag->name }}
                                    </span>
                                @endforeach
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