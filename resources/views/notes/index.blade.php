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
                <a href="{{ route('notes.show', $note) }}">
                    <li class="rounded-xl border mb-4 p-2 flex flex-row justify-between items-center">
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
                    </li>
                </a>
            @empty
                <li class="text-center">No hay notas disponibles.</li>
            @endforelse
        </ul>
    </div>
@endsection