<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index(){
        return view('tags.index');
    }

    public function create(){
        return view('tags.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:tags,name',
        ]);

        Tag::create($data);
        return redirect()->route('notes.index')->with('success', 'Etiqueta creada exitosamente.');
    }

    public function edit($id){
        return view('tags.edit');
    }

    public function update(Request $request, $id){
        // Validate and update the tag
    }

    public function destroy($id){
        // Delete a specific tag
    }
}
