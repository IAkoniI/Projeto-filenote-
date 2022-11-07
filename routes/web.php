<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [NoteController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::post('criar_anotacao', [NoteController::class, 'create'])->middleware(['auth'])->name('create.note');
Route::post('editar_anotacao', [NoteController::class, 'update'])->middleware(['auth'])->name('update.note');

require __DIR__.'/auth.php';
