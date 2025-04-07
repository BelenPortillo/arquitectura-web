@extends('layout')

@section('contenido')
<h2 class="mb-4 text-center">Detalle de Subtarea</h2>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">{{ $subtarea['titulo'] }}</h5>
    <p class="card-text">{{ $subtarea['descripcion'] }}</p>
    <p><strong>Estado:</strong> 
      <span class="badge {{ $subtarea['estado'] === 'Pendiente' ? 'bg-warning text-dark' : 'bg-success' }}">
        {{ $subtarea['estado'] }}
      </span>
    </p>
    <p><strong>Fecha límite:</strong> {{ $subtarea['fecha_limite'] }}</p>
  </div>
</div>

<a href="{{ url('/subtareas') }}" class="btn btn-secondary mt-4">← Volver a Subtareas</a>
@endsection
