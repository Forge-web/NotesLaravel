<?php

use App\Http\Controllers\NotesController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/note/{note:id}', [PagesController::class, 'show'])->name('show');

// Route::apiResource('/api', NotesController::class);
// Route::get('/api', function() {
//     return 'TEST API';
// });