<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotesController;



// Route::apiResource('/v1', NotesController::class);

Route::get('/', [NotesController::class, 'index']);
Route::post('/', [NotesController::class, 'store']);
Route::put('/{id}', [NotesController::class, 'update']);
Route::patch('/{id}', [NotesController::class, 'update']);
Route::delete('/{id}', [NotesController::class, 'destroy']);