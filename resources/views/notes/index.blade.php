@extends('layout.app')
@section('title', 'Welcome to MyTagNotes')

@section('content')
    <h1 class="text-center text-2xl font-semibold mb-2">Notas</h1>
    <div class="flex justify-center items-center gap-2 mb-6">
        <x-boton-naranja href="{{ route('tags.create') }}">Ver Etiquetas</x-boton-naranja>
        <x-boton-verde href="{{ route('notes.create') }}">Crear Nota</x-boton-verde>
    </div>
    @if( session('success') )
        <div class="bg-green-500 text-white font-bold rounded-lg mb-4 p-4 text-center">
            {{ session('success') }}
        </div>
    @endif
    <div>
        <ul>
            @forelse ($notes as $note)
                <li>
                    <strong>{{ $note->title }}</strong>
                    <br>
                    {{ $note->content }}
                    <br><br>
                </li>
            @empty
                <li class="text-center">No hay notas disponibles.</li>
            @endforelse
        </ul>
    </div>
@endsection