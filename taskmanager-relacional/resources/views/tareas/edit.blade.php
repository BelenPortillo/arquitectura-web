@extends('layout')

@section('contenido')
<h2 class="mb-4 text-center">Editar Tarea</h2>

<form method="POST" action="#">
  {{-- @csrf --}}

  <div class="mb-3">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" class="form-control is-invalid" id="titulo" name="titulo" value="Preparar presentación">
    <div class="invalid-feedback">El título es obligatorio.</div>
  </div>

  <div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea class="form-control is-invalid" id="descripcion" name="descripcion" rows="3">Revisar slides finales</textarea>
    <div class="invalid-feedback">La descripción es requerida.</div>
  </div>

  <div class="mb-3">
    <label for="estado" class="form-label">Estado</label>
    <select class="form-select is-invalid" id="estado" name="estado">
      <option selected>Pendiente</option>
      <option>Completada</option>
    </select>
    <div class="invalid-feedback">Selecciona un estado válido.</div>
  </div>

  <div class="mb-3">
    <label for="fecha_limite" class="form-label">Fecha límite</label>
    <input type="date" class="form-control is-invalid" id="fecha_limite" name="fecha_limite" value="2025-04-12">
    <div class="invalid-feedback">La fecha límite es obligatoria.</div>
  </div>

  <div class="text-end">
    <button type="submit" class="btn btn-success">Actualizar Tarea</button>
    <a href="{{ url('/tareas') }}" class="btn btn-secondary">Cancelar</a>
  </div>
</form>
@endsection
