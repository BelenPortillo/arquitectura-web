@extends('layout')

@section('contenido')
<h2 class="mb-4 text-center">Detalle de Tarea</h2>

<div class="card mb-4">
  <div class="card-body">
    <h5 class="card-title">Preparar presentación</h5>
    <p class="card-text">Finalizar los slides de la exposición y ensayar en equipo.</p>
    <p><strong>Estado:</strong> <span class="badge bg-warning text-dark">Pendiente</span></p>
    <p><strong>Fecha límite:</strong> 2025-04-12</p>
  </div>
</div>

<!-- Subtareas -->
<h4 class="mb-3">Subtareas</h4>

<div class="d-flex justify-content-end mb-3">
  <a href="{{ url('/subtareas/create') }}" class="btn btn-sm btn-primary">+ Agregar Subtarea</a>
</div>

<table class="table table-bordered table-hover">
  <thead class="table-light">
    <tr>
      <th>#</th>
      <th>Título</th>
      <th>Descripción</th>
      <th>Estado</th>
      <th>Fecha límite</th>
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

<a href="{{ url('/tareas') }}" class="btn btn-secondary mt-4">← Volver a Tareas</a>
@endsection
