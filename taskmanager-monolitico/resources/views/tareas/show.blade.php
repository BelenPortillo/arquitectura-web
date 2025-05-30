<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Detalle de Tarea
    </h2>
  </x-slot>

  <div class="py-12 w-full px-4 sm:px-6 lg:px-8 space-y-6">
    <div class="bg-white ring-1 ring-gray-200 shadow rounded-lg p-6 space-y-4">

      <div>
        <h3 class="text-lg font-semibold text-gray-700 mb-2">Título</h3>
        <p class="text-gray-800">{{ $tarea->titulo }}</p>
      </div>

      <div>
        <h3 class="text-lg font-semibold text-gray-700 mb-2">Descripción</h3>
        <p class="text-gray-800 whitespace-pre-line">{{ $tarea->descripcion }}</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <h3 class="text-sm font-medium text-gray-500">Fecha Inicio</h3>
          <p>{{ $tarea->fecha_inicio }}</p>
        </div>
        <div>
          <h3 class="text-sm font-medium text-gray-500">Fecha Fin</h3>
          <p>{{ $tarea->fecha_fin }}</p>
        </div>
        <div>
          <h3 class="text-sm font-medium text-gray-500">Estado</h3>
          <p class="capitalize">{{ str_replace('_', ' ', $tarea->estado) }}</p>
        </div>
        <div>
          <h3 class="text-sm font-medium text-gray-500">Prioridad</h3>
          <p class="capitalize">{{ $tarea->prioridad }}</p>
        </div>
        <div>
          <h3 class="text-sm font-medium text-gray-500">Asignado a</h3>
          <p>{{ $tarea->user->name ?? 'No asignado' }}</p>
        </div>
      </div>

      <div class="pt-6">
        <a href="{{ route('tareas.index') }}" class="text-indigo-600 hover:underline">← Volver al listado</a>
      </div>

    </div>
  </div>
  <div class="bg-white ring-1 ring-gray-200 shadow rounded-lg p-6 space-y-4 mt-8">
    <h3 class="text-lg font-semibold text-gray-700 flex items-center">
      📝 Subtareas de esta tarea
    </h3>

    @if(session('success'))
      <div class="bg-green-50 border border-green-200 text-green-800 text-sm rounded p-3">
        {{ session('success') }}
      </div>
    @endif

    <!-- Lista de subtareas -->
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700 mt-4">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-4 py-2 text-left">Título</th>
            <th class="px-4 py-2 text-left">Estado</th>
            <th class="px-4 py-2 text-left">Descripción</th>
            <th class="px-4 py-2 text-center">Acciones</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @forelse($tarea->subtareas as $s)
            <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100">
              <td class="px-4 py-2">{{ $s->titulo }}</td>
              <td class="px-4 py-2">
                <form action="{{ route('subtareas.estado', [$tarea, $s]) }}" method="POST">
                  @csrf
                  @method('PATCH')
                  <select name="estado" onchange="this.form.submit()" 
                          class="text-sm rounded px-2 py-1 shadow-sm border 
                          {{ 
                            $s->estado === 'finalizado' ? 'bg-green-100 text-green-800 border-green-300' : 
                            ($s->estado === 'en_proceso' ? 'bg-yellow-100 text-yellow-800 border-yellow-300' : 
                            'bg-gray-100 text-gray-800 border-gray-300') 
                          }}">
                    <option value="pendiente" {{ $s->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="en_proceso" {{ $s->estado == 'en_proceso' ? 'selected' : '' }}>En Proceso</option>
                    <option value="finalizado" {{ $s->estado == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                  </select>
                </form>
              </td>
              <td class="px-4 py-2">{{ $s->descripcion }}</td>
              <td class="px-4 py-2 text-center">
                <form action="{{ route('subtareas.destroy', [$tarea, $s]) }}" method="POST"
                      onsubmit="return confirm('¿Eliminar esta subtarea?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-red-600 hover:underline text-xs">Eliminar</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="px-4 py-2 text-center text-gray-500">Sin subtareas registradas.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

        <!-- Formulario nueva subtarea -->
    <form action="{{ route('subtareas.store', $tarea) }}" method="POST" class="space-y-3">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <input type="text" name="titulo" placeholder="Título de la subtarea"
                class="w-full border border-gray-300 rounded px-3 py-2 shadow-sm" required>
        </div>
        <div>
          <input type="text" name="descripcion" placeholder="Descripción (opcional)"
                class="w-full border border-gray-300 rounded px-3 py-2 shadow-sm">
        </div>
        <div>
          <select name="estado" class="w-full border border-gray-300 rounded px-3 py-2 shadow-sm">
            <option value="pendiente" selected>Pendiente</option>
            <option value="en_proceso">En Proceso</option>
            <option value="finalizado">Finalizado</option>
          </select>
        </div>
      </div>
      <button type="submit"
              class="mt-2 px-4 py-2 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700 transition">
        + Agregar Subtarea
      </button>
    </form>
    
  </div>
</x-app-layout>
