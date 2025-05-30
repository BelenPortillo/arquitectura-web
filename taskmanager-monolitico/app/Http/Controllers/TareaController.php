<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\User;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $rol  = $user->roles->pluck('name')->first();

        // Admin y Supervisor ven todo
        if (in_array($rol, ['administrador', 'supervisor'])) {
            $tareas = Tarea::with('user')->latest()->paginate(10);
        } else {
            // Usuario común ve solo sus tareas
            $tareas = Tarea::with('user')
                ->where('user_id', $user->id)
                ->latest()
                ->paginate(10);
        }

        return view('tareas.index', compact('tareas'));
    }

    public function create()
    {
        $user = auth()->user();

        if ($user->hasRole('administrador')) {
            $usuarios = User::orderBy('name')->get();
        } else {
            // Solo puede asignarse a sí mismo
            $usuarios = collect([$user]);
        }

        return view('tareas.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'       => 'required|string|max:255',
            'descripcion'  => 'nullable|string',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin'    => 'nullable|date|after_or_equal:fecha_inicio',
            'estado'       => 'required|in:pendiente,en_proceso,finalizado',
            'prioridad'    => 'required|in:alta,media,baja',
            'user_id'      => 'required|exists:users,id',
        ]);

        $user = auth()->user();

        // Si no es admin, fuerza su propio ID
        if ($user->hasRole('usuario')) {
            $request->merge(['user_id' => $user->id]);
        }

        Tarea::create($request->all());

        return redirect()->route('tareas.index')->with('success', 'Tarea creada exitosamente.');
    }

    public function show(Tarea $tarea)
    {
        if (auth()->user()->hasRole('usuario') && $tarea->user_id !== auth()->id()) {
            abort(403, 'No tenés permiso para acceder a esta tarea.');
        }

        return view('tareas.show', compact('tarea'));
    }

    public function edit(Tarea $tarea)
    {
        if (auth()->user()->hasRole('usuario') && $tarea->user_id !== auth()->id()) {
            abort(403, 'No tenés permiso para acceder a esta tarea.');
        }

        $usuarios = User::orderBy('name')->get();
        return view('tareas.edit', compact('tarea', 'usuarios'));
    }

    public function update(Request $request, Tarea $tarea)
    {
        $request->validate([
            'titulo'       => 'required|string|max:255',
            'descripcion'  => 'nullable|string',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin'    => 'nullable|date|after_or_equal:fecha_inicio',
            'estado'       => 'required|in:pendiente,en_proceso,finalizado',
            'prioridad'    => 'required|in:alta,media,baja',
            'user_id'      => 'required|exists:users,id',
        ]);

        $tarea->update($request->all());

        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada correctamente.');
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();

        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada correctamente.');
    }
}
