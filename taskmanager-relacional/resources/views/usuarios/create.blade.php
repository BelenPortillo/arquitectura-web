@extends('layout')

@section('contenido')
<h2 class="mb-4 text-center">Registrar Nuevo Usuario</h2>

<form method="POST" action="#">
  {{-- @csrf --}}

  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre completo</label>
    <input type="text" class="form-control is-invalid" id="nombre" name="nombre" placeholder="Ej: Ana Gómez">
    <div class="invalid-feedback">El nombre es obligatorio.</div>
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Correo electrónico</label>
    <input type="email" class="form-control is-invalid" id="email" name="email" placeholder="usuario@mail.com">
    <div class="invalid-feedback">Debes ingresar un email válido.</div>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Contraseña</label>
    <input type="password" class="form-control is-invalid" id="password" name="password" placeholder="••••••••">
    <div class="invalid-feedback">La contraseña debe tener al menos 6 caracteres.</div>
  </div>

  <div class="text-end">
    <button type="submit" class="btn btn-success">Guardar Usuario</button>
    <a href="{{ url('/usuarios') }}" class="btn btn-secondary">Cancelar</a>
  </div>
</form>
@endsection
