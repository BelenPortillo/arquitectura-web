{{-- resources/views/usuarios/show.blade.php --}}
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Detalle de Usuario
    </h2>
  </x-slot>

  <div class="py-12 w-full px-4 sm:px-6 lg:px-8">
    <div class="bg-white ring-1 ring-gray-200 shadow rounded-lg p-6 space-y-6">

      {{-- Datos estáticos --}}
      <dl class="grid grid-cols-1 gap-4">
        <div>
          <dt class="text-sm font-medium text-gray-700">Nombre</dt>
          <dd class="mt-1">{{ $usuario->name }}</dd>
        </div>
        <div>
          <dt class="text-sm font-medium text-gray-700">Email</dt>
          <dd class="mt-1">{{ $usuario->email }}</dd>
        </div>
      </dl>

      {{-- Form para cambiar rol --}}
      <form action="{{ route('usuarios.update', $usuario) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <fieldset>
          <legend class="text-sm font-medium text-gray-700">Rol</legend>
          <div class="mt-2 space-y-2">
            @foreach($roles as $id => $desc)
              <label class="inline-flex items-center">
                <input
                  type="radio"
                  name="roles"
                  value="{{ $id }}"
                  {{ $usuario->roles->pluck('id')->contains($id) ? 'checked' : '' }}
                  class="form-radio text-indigo-600"
                />
                <span class="ml-2 text-gray-700">{{ $desc }}</span>
              </label>
            @endforeach
          </div>
          @error('roles')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </fieldset>

        <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
          <a
            href="{{ route('usuarios.index') }}"
            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200"
          >
            Volver
          </a>
          <button
            type="submit"
            class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
          >
            Guardar Rol
          </button>
        </div>
      </form>

    </div>
  </div>
</x-app-layout>
