<?php

namespace App\Http\Controllers;

use App\Models\Subtarea;
use App\Models\Tarea;
use Illuminate\Http\Request;

class SubtareaController extends Controller
{
    public function store(Request $request, Tarea $tarea)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'required|in:pendiente,en_proceso,finalizado',
        ]);

        $tarea->subtareas()->create($request->all());

        return redirect()->route('tareas.show', $tarea)->with('success', 'Subtarea creada exitosamente.');
    }

    public function destroy(Tarea $tarea, Subtarea $subtarea)
    {
        $subtarea->delete();

        return redirect()->route('tareas.show', $tarea)->with('success', 'Subtarea eliminada correctamente.');
    }

    public function cambiarEstado(Request $request, Tarea $tarea, Subtarea $subtarea)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,en_proceso,finalizado',
        ]);

        $subtarea->estado = $request->estado;
        $subtarea->save();

        return redirect()->route('tareas.show', $tarea)->with('success', 'Estado de la subtarea actualizado.');
    }
    
}
