<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Support\Facades\Auth;

Route::get('/dashboard', function () {
    $usuario = Auth::user();

    $query = Tarea::where('user_id', $usuario->id);

    $pendientes  = $query->where('estado', 'pendiente')->count();
    $enProceso   = $query->where('estado', 'en_proceso')->count();
    $finalizadas = $query->where('estado', 'finalizado')->count();

    return view('dashboard', compact('pendientes', 'enProceso', 'finalizadas'));
})->middleware(['auth'])->name('dashboard');
