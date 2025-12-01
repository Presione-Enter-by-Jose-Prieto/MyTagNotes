@extends('layout.app')
@section('title', $note->title)

@section('content')
    <h1 class="text-center text-2xl font-semibold mb-2">{{ $note->title }}</h1>
    <div class="box-border border rounded p-4">
        <p class="mb-4">{{ $note->content }}</p>
        <div class="flex flex-row items-center mb-4">
            @foreach($note->tags as $tag)
                <span class="inline-block bg-blue-200 text-blue-800 text-xs px-2 py-1 rounded-full mr-2">
                    {{ $tag->name }}
                </span>
            @endforeach
        </div>
        <div class="flex flex-row gap-2 justify-end">
            <x-boton-gris href="{{ route('notes.index') }}">Volver a Notas</x-boton-gris>
            <x-boton-naranja href="{{ route('notes.edit', $note) }}">Editar Nota</x-boton-naranja>
        </div>
    </div>
@endsection