<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Bienvenido/a, {{ Auth::user()->name }}
    </h2>
  </x-slot>

  <div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

      {{-- Tarjetas resumen --}}
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow text-center">
          <h3 class="text-sm text-gray-500">Tareas Pendientes</h3>
          <p class="mt-2 text-3xl font-bold text-indigo-600">{{ $pendientes }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow text-center">
          <h3 class="text-sm text-gray-500">En Proceso</h3>
          <p class="mt-2 text-3xl font-bold text-yellow-500">{{ $enProceso }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow text-center">
          <h3 class="text-sm text-gray-500">Finalizadas</h3>
          <p class="mt-2 text-3xl font-bold text-green-600">{{ $finalizadas }}</p>
        </div>
      </div>

      {{-- Accesos rápidos --}}
      <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Accesos rápidos</h3>
        <div class="flex flex-wrap gap-4">
          <a href="{{ route('tareas.index') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 text-sm">Ver Tareas</a>
          <a href="{{ route('tareas.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 text-sm">+ Nueva Tarea</a>
          @if(Auth::user()->hasRole('administrador'))
            <a href="{{ route('usuarios.index') }}" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800 text-sm">Usuarios</a>
          @endif
        </div>
      </div>

    </div>
  </div>
</x-app-layout>
