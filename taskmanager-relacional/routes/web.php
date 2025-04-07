<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\SubtareaController;

Route::get('/', function () {
    return view('dashboard');
});


// Usuarios
Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuarios/create', [UsuarioController::class, 'create']);
Route::get('/usuarios/edit/{id}', [UsuarioController::class, 'edit']);

// Tareas
Route::get('/tareas', [TareaController::class, 'index']);
Route::get('/tareas/create', [TareaController::class, 'create']);
Route::get('/tareas/edit/{id}', [TareaController::class, 'edit']);
Route::get('/tareas/ver/{id}', [TareaController::class, 'show']);

// Subtareas
Route::get('/subtareas', [SubtareaController::class, 'index']);
Route::get('/subtareas/create', [SubtareaController::class, 'create']);
Route::get('/subtareas/edit/{id}', [SubtareaController::class, 'edit']);
Route::get('/subtareas/ver/{id}', [SubtareaController::class, 'show']);

