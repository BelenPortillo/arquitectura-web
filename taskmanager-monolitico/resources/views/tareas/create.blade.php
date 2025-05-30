<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Nueva Tarea
    </h2>
  </x-slot>

  <div class="py-12 w-full px-4 sm:px-6 lg:px-8 space-y-6">
    <div class="bg-white ring-1 ring-gray-200 shadow rounded-lg p-6 space-y-4">

      <form action="{{ route('tareas.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
          <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
          <input type="text" name="titulo" id="titulo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div>
          <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
          <textarea name="descripcion" id="descripcion" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div>
            <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha Inicio</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
          </div>
          <div>
            <label for="fecha_fin" class="block text-sm font-medium text-gray-700">Fecha Fin</label>
            <input type="date" name="fecha_fin" id="fecha_fin" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
          </div>
          <div>
            <label for="prioridad" class="block text-sm font-medium text-gray-700">Prioridad</label>
            <select name="prioridad" id="prioridad" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
              <option value="alta">Alta</option>
              <option value="media" selected>Media</option>
              <option value="baja">Baja</option>
            </select>
          </div>
        </div>

        <div>
          <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
          <select name="estado" id="estado" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            <option value="pendiente" selected>Pendiente</option>
            <option value="en_proceso">En Proceso</option>
            <option value="finalizado">Finalizado</option>
          </select>
        </div>

        <div>
          <label for="user_id" class="block text-sm font-medium text-gray-700">Usuario Responsable</label>
          <select name="user_id" id="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @foreach($usuarios as $u)
              <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->email }})</option>
            @endforeach
          </select>
        </div>

        <div class="flex justify-end">
          <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
            Guardar Tarea
          </button>
        </div>

      </form>

    </div>
  </div>
</x-app-layout>
