<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TagController;


Route::get('/', function () {
    return redirect()->route('notes.index');
});

Route::resource('notes', NoteController::class);
Route::resource('tags', TagController::class)->except(['show']);




// Route::get('/', [NoteController::class, 'index'])->name('notes.index');

// Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
// Route::post('/notes/store', [NoteController::class, 'store'])->name('notes.store');

// Route::get('/notes/{id}', [NoteController::class, 'show'])->name('notes.show');
// Route::get('/notes/edit/{id}', [NoteController::class, 'edit'])->name('notes.edit');
// Route::put('/notes/update/{id}', [NoteController::class, 'update'])->name('notes.update');
// Route::delete('/notes/destroy/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');


// Route::get('/tags', [TagController::class, 'index'])->name('tags.index');

// Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
// Route::post('/tags/store', [TagController::class, 'store'])->name('tags.store');

// Route::get('/tags/edit/{id}', [TagController::class, 'edit'])->name('tags.edit');
// Route::put('/tags/update/{id}', [TagController::class, 'update'])->name('tags.update');
// Route::delete('/tags/destroy/{id}', [TagController::class, 'destroy'])->name('tags.destroy');