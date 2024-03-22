<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [NoteController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::resource('note', NoteController::class);
    Route::get('/note-pdf/{note}', [NoteController::class,'generatePDF'])->name('note.pdf');
});

require __DIR__.'/auth.php';
