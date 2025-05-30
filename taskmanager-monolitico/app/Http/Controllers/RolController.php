<?php
namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('name')->paginate(10);
        return view('roles.index', compact('roles'));
    }

    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
          'name'        => 'required|string|unique:roles,name',
          'description' => 'nullable|string',
        ]);
        Role::create($data);
        return redirect()->route('roles.index')->with('success','Rol creado.');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
          'name'        => "required|string|unique:roles,name,{$role->id}",
          'description' => 'nullable|string',
        ]);
        $role->update($data);
        return redirect()->route('roles.index')->with('success','Rol actualizado.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success','Rol eliminado.');
    }
}
