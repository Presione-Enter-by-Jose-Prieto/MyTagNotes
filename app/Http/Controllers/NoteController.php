<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(){
        return view('notes.index');
    }

    public function create(){
        return view('notes.create');
    }

    public function store(Request $request){
        // Validate and store the note
    }

    public function show($id){
        return view('notes.show');
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
