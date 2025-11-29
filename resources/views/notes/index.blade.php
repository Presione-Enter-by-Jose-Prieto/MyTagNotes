@extends('layout.app')
@section('title', 'Welcome to MyTagNotes')

@section('content')
    <h1 class="text-center text-2xl font-semibold mb-2">Notas</h1>
    <div class="flex justify-center items-center gap-2 mb-2">
        <x-boton-naranja href="">Ver Etiquetas</x-boton-naranja>
        <x-boton-verde href="">Crear Nota</x-boton-verde>
    </div>
@endsection