<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Tag;

class NoteController extends Controller
{
    public function index(){
        $notes = Note::with('tags')->orderBy('created_at', 'desc')->get();
        return view('notes.index', compact('notes'));
    }

    public function create(){
        $tags = Tag::all();
        return view('notes.create', compact('tags'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        $note = Note::create($data);

        if($request->filled('tags')){
            $note->tags()->sync($request->tags);
        }

        return redirect()->route('notes.index')->with('success', 'Nota creada exitosamente.');
    }

    public function show($id){
        $note = Note::with('tags')->findOrFail($id);
        return view('notes.show', compact('note'));
    }

    public function edit(Note $note){
        $tags = Tag::all(); // todas las etiquetas disponibles
        $note->load('tags'); // carga las etiquetas de la nota

        return view('notes.edit', compact('note', 'tags'));
    }

    public function update(Request $request, $id){
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);
        $note = Note::findOrFail($id);
        $note->update($data);
        if($request->filled('tags')){
            $note->tags()->sync($request->tags);
        } else {
            $note->tags()->detach();
        }
        return redirect()->route('notes.index')->with('success', 'Nota actualizada exitosamente.');
    }

    public function destroy($id){
        $note = Note::findOrFail($id);
        $note->tags()->detach();
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Nota eliminada exitosamente.');
    }
}
