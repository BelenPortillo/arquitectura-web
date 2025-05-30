<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Listado de usuarios
    public function index()
    {
        $usuarios = User::with('roles')->orderBy('name')->paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }

    // Mostrar detalle de un usuario
    public function show(User $usuario)
    {
        // obtenemos todos los roles en un array id => nombre
        $roles = Role::pluck('name', 'id')->toArray();

        return view('usuarios.show', compact('usuario', 'roles'));
    }

    public function create()
    {
        $roles = Role::pluck('name');
        return view('usuarios.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|string|min:6|confirmed',
            'role'                  => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user->assignRole($data['role']);

        return redirect()
            ->route('usuarios.index')
            ->with('success','Usuario creado correctamente.');
    }

    // Formulario para asignar roles
    public function edit(User $usuario)
    {
        $roles = Role::orderBy('name')->pluck('description','id');
        return view('usuarios.edit', compact('usuario','roles'));
    }

    // Actualiza roles
    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'roles' => ['required','exists:roles,id']
        ]);
    
        // Sin trait: usa la relación roles()
        $usuario->roles()->sync([$request->input('roles')]);
    
        return redirect()
          ->route('usuarios.show', $usuario)
          ->with('success','Rol actualizado correctamente.');
    }

    // Elimina usuario
    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()
            ->route('usuarios.index')
            ->with('success','Usuario eliminado.');
    }
}
