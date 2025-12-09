@extends('layout.app')
@section('title', $note->title)

@section('content')
    <h1 class="text-center text-2xl font-semibold mb-2">{{ $note->title }}</h1>
    <div class="rounded-xl border mb-4 p-3 flex flex-col bg-gray-100 border-gray-300">
        <p 
         class="mb-4 text-sm leading-relaxed text-gray-700 whitespace-pre-line 
         wrap-break-words max-h-48 overflow-y-auto p-2 bg-gray-50 rounded-md border 
         border-gray-200"
        >{{ $note->content }}</p>
        <div class="flex flex-row items-center mb-2">
            @foreach($note->tags as $tag)
                <span class="inline-flex items-center gap-1 bg-gray-200 text-gray-700 text-xs px-2 py-0.5 rounded-full mr-1 border border-gray-300 font-medium leading-none">
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