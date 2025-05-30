{{-- resources/views/usuarios/index.blade.php --}}
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Usuarios
    </h2>
  </x-slot>

  <div class="py-12 w-full px-4 sm:px-6 lg:px-8 space-y-6">
    <div class="bg-white ring-1 ring-gray-200 shadow rounded-lg p-6 space-y-4">

      <div class="flex justify-between items-center">
        <h3 class="text-lg font-semibold text-gray-700">Listado de Usuarios</h3>
        <a
          href="{{ route('usuarios.create') }}"
          class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
        >
          Nuevo Usuario
        </a>
      </div>

      @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 text-sm rounded p-3">
          {{ session('success') }}
        </div>
      @endif

      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-600">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-4 py-3 text-left font-medium text-gray-700 uppercase">Nombre</th>
              <th class="px-4 py-3 text-left font-medium text-gray-700 uppercase">Email</th>
              <th class="px-4 py-3 text-left font-medium text-gray-700 uppercase">Roles</th>
              <th class="px-4 py-3 text-center font-medium text-gray-700 uppercase">Acciones</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            @foreach($usuarios as $u)
              <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100">
                <td class="px-4 py-2 whitespace-nowrap">{{ $u->name }}</td>
                <td class="px-4 py-2 whitespace-nowrap">{{ $u->email }}</td>
                <td class="px-4 py-2 whitespace-nowrap">{{ $u->roles->pluck('name')->implode(', ') }}</td>
                <td class="px-4 py-2 whitespace-nowrap text-center space-x-2">
                  <a
                    href="{{ route('usuarios.show', $u) }}"
                    class="inline-block px-3 py-1 bg-indigo-600 text-white text-xs font-medium rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
                  >Rol</a>
                  <form
                    action="{{ route('usuarios.destroy', $u) }}"
                    method="POST"
                    class="inline"
                    onsubmit="return confirm('¿Eliminar usuario?');"
                  >
                    @csrf
                    @method('DELETE')
                    <button
                      type="submit"
                      class="inline-block px-3 py-1 bg-white text-red-600 text-xs font-medium border border-red-600 rounded hover:bg-red-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-300 transition"
                    >Eliminar</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="flex justify-end">
        {{ $usuarios->links() }}
      </div>

    </div>
  </div>
</x-app-layout>
