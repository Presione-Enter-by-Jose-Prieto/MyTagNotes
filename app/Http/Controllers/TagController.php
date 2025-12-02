<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function create(){
        $tags = Tag::orderBy('updated_at', 'desc')->get();
        return view('tags.create', compact('tags'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:tags,name',
        ]);

        Tag::create($data);
        return redirect()->route('tags.create')->with('success', 'Etiqueta creada exitosamente.');
    }

    public function edit($id){
        $tag = Tag::findOrFail($id);
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag){
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:tags,name,'. $tag->id,
        ]);

        $tag->update($data);
        return redirect()->route('tags.create')->with('success', 'Etiqueta actualizada exitosamente.');
    }

    public function destroy(Tag $tag){
        $tag->delete();
        return redirect()->route('tags.create')->with('success', 'Etiqueta eliminada exitosamente.');
    }
}
