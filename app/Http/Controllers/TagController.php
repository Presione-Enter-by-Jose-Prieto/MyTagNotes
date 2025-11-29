<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        return view('tags.index');
    }

    public function create(){
        return view('tags.create');
    }

    public function store(Request $request){
        // Validate and store the tag
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
