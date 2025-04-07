<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('usuarios.index');
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function edit($id)
    {
        $usuario = [
            'id' => $id,
            'nombre' => 'Juan Pérez',
            'email' => 'juan@mail.com'
        ];

        return view('usuarios.edit', compact('usuario'));
    }
}
