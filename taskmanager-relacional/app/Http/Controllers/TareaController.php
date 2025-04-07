<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        return view('tareas.index');
    }

    public function create()
    {
        return view('tareas.create');
    }

    public function edit($id)
    {
        return view('tareas.edit', ['id' => $id]);
    }

    public function show($id)
    {
        // Datos simulados
        $tarea = [
            'id' => $id,
            'titulo' => 'Preparar presentación',
            'descripcion' => 'Finalizar los slides de la exposición y ensayar en equipo.',
            'estado' => 'Pendiente',
            'fecha_limite' => '2025-04-12'
        ];

        $subtareas = [
            ['id' => 1, 'titulo' => 'Diseñar portada', 'descripcion' => 'Slide de introducción', 'estado' => 'Completada', 'fecha_limite' => '2025-04-08'],
            ['id' => 2, 'titulo' => 'Practicar exposición', 'descripcion' => 'Simular presentación con compañero', 'estado' => 'Pendiente', 'fecha_limite' => '2025-04-10'],
        ];

        return view('tareas.ver', compact('tarea', 'subtareas'));
    }
}
