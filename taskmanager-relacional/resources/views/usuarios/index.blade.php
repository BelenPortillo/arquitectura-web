@extends('layout')

@section('contenido')
<h2 class="mb-4 text-center">Gestión de Usuarios</h2>

<div class="d-flex justify-content-end mb-3">
  <a href="{{ url('/usuarios/create') }}" class="btn btn-primary">+ Nuevo Usuario</a>
</div>

<table class="table table-striped">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Email</th>
      <th>Rol</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Administrador</td>
      <td>admin@mail.com</td>
      <td><span class="badge bg-success">Admin</span></td>
      <td>
        <a href="{{ url('/usuarios/edit/1') }}" class="btn btn-sm btn-outline-secondary">Editar</a>
        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
      </td>
    </tr>
    <tr>
      <td>2</td>
      <td>Juan Pérez</td>
      <td>juan@mail.com</td>
      <td><span class="badge bg-secondary">Usuario</span></td>
      <td>
        <a href="{{ url('/usuarios/edit/2') }}" class="btn btn-sm btn-outline-secondary">Editar</a>
        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
      </td>
    </tr>
  </tbody>
</table>
@endsection
