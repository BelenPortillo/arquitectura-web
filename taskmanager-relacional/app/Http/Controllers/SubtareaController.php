<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubtareaController extends Controller
{
    public function index()
    {
        return view('subtareas.index');
    }

    public function create()
    {
        return view('subtareas.create');
    }

    public function edit($id)
    {
        return view('subtareas.edit', ['id' => $id]);
    }

    public function show($id)
    {
        // Datos simulados
        $subtarea = [
            'id' => $id,
            'titulo' => 'Diseñar portada',
            'descripcion' => 'Slide de introducción para la exposición',
            'estado' => 'Completada',
            'fecha_limite' => '2025-04-08'
        ];

        return view('subtareas.ver', compact('subtarea'));
    }

}
