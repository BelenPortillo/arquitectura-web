@extends('layout')

@section('contenido')
@php
  // Simulación de usuario logueado
  $usuario = [
    'nombre' => 'Ana Gómez',
    'rol' => 'Admin'
  ];
@endphp

<div class="text-center mb-5">
  <h1 class="display-5 fw-bold">Bienvenido/a, {{ $usuario['nombre'] }}</h1>
  <p class="lead">Rol: <strong>{{ $usuario['rol'] }}</strong></p>
  <p class="text-muted">Este es tu panel principal en <strong>TaskManager PRO</strong>.</p>
</div>

<div class="row text-center">
  <div class="col-md-4 mb-4">
    <div class="card shadow">
      <div class="card-body">
        <h5 class="card-title">Usuarios</h5>
        <p class="card-text">Gestiona los perfiles de acceso y roles.</p>
        <a href="{{ url('/usuarios') }}" class="btn btn-outline-primary">Ver Usuarios</a>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-4">
    <div class="card shadow">
      <div class="card-body">
        <h5 class="card-title">Tareas</h5>
        <p class="card-text">Controla y visualiza tus tareas pendientes y finalizadas.</p>
        <a href="{{ url('/tareas') }}" class="btn btn-outline-success">Ver Tareas</a>
      </div>
    </div>
  </div>

  <div class="col-md-4 mb-4">
    <div class="card shadow">
      <div class="card-body">
        <h5 class="card-title">Subtareas</h5>
        <p class="card-text">Gestiona las subtareas asociadas a cada tarea.</p>
        <a href="{{ url('/subtareas') }}" class="btn btn-outline-warning">Ver Subtareas</a>
      </div>
    </div>
  </div>
</div>
@endsection
