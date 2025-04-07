@extends('layout')

@section('contenido')
<h2 class="mb-4 text-center">Lista de Tareas</h2>

<div class="d-flex justify-content-end mb-3">
  <a href="{{ url('/tareas/create') }}" class="btn btn-primary">+ Nueva Tarea</a>
</div>

<table class="table table-striped">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Título</th>
      <th>Descripción</th>
      <th>Estado</th>
      <th>Fecha Límite</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>Preparar presentación</td>
      <td>Finalizar slides y ensayar</td>
      <td><span class="badge bg-warning text-dark">Pendiente</span></td>
      <td>2025-04-12</td>
      <td>
        <a href="{{ url('/tareas/ver/1') }}" class="btn btn-sm btn-outline-info">Ver</a>
        <a href="{{ url('/tareas/edit/1') }}" class="btn btn-sm btn-outline-secondary">Editar</a>
        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
      </td>
    </tr>
  </tbody>
</table>
@endsection