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

    public function edit($id){
        return view('notes.edit');
    }

    public function update(Request $request, $id){
        // Validate and update the note
    }

    public function destroy($id){
        // Delete a specific note
    }
}
