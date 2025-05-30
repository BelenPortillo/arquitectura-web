<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\SubtareaController;
use App\Http\Controllers\DashboardController;
use App\Models\Tarea;
use Illuminate\Http\Request; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $usuario = Auth::user();

    $query = $usuario->hasRole('administrador')
        ? Tarea::query()
        : Tarea::where('user_id', $usuario->id);

    $pendientes  = $query->where('estado', 'pendiente')->count();
    $enProceso   = $query->where('estado', 'en_proceso')->count();
    $finalizadas = $query->where('estado', 'finalizado')->count();

    return view('dashboard', compact('pendientes', 'enProceso', 'finalizadas'));
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Solo administrador
Route::middleware(['auth', 'role:administrador,usuario,supervisor'])->group(function () {
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('roles', RolController::class);
});

// Administrador y usuario
Route::middleware(['auth', 'role:administrador,usuario'])->group(function () {
    Route::resource('tareas', TareaController::class);
    Route::resource('tareas.subtareas', SubtareaController::class);
});

Route::resource('tareas', TareaController::class)->middleware(['auth']);
Route::resource('tareas.subtareas', SubtareaController::class)->middleware('auth');
Route::post('/tareas/{tarea}/subtareas', [SubtareaController::class, 'store'])->name('subtareas.store')->middleware('auth');
Route::delete('/tareas/{tarea}/subtareas/{subtarea}', [SubtareaController::class, 'destroy'])->name('subtareas.destroy')->middleware('auth');
Route::patch('/tareas/{tarea}/subtareas/{subtarea}/estado', [SubtareaController::class, 'cambiarEstado'])->name('subtareas.estado')->middleware('auth');

require __DIR__.'/auth.php';

// Sobrescribir logout para redirigir a login
Route::post('logout', function(Request $request){
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');
