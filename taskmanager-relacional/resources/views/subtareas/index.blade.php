@extends('layout')

@section('contenido')
<h2 class="mb-4 text-center">Subtareas</h2>

<div class="d-flex justify-content-end mb-3">
  <a href="{{ url('/subtareas/create') }}" class="btn btn-primary">+ Nueva Subtarea</a>
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
      <td>Diseñar portada</td>
      <td>Slide de introducción</td>
      <td><span class="badge bg-success">Completada</span></td>
      <td>2025-04-08</td>
      <td>
        <a href="{{ url('/subtareas/edit/1') }}" class="btn btn-sm btn-outline-secondary">Editar</a>
        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
      </td>
    </tr>
    <tr>
      <td>2</td>
      <td>Practicar exposición</td>
      <td>Simular presentación con compañero</td>
      <td><span class="badge bg-warning text-dark">Pendiente</span></td>
      <td>2025-04-10</td>
      <td>
        <a href="{{ url('/subtareas/edit/2') }}" class="btn btn-sm btn-outline-secondary">Editar</a>
        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
      </td>
    </tr>
  </tbody>
</table>
@endsection
