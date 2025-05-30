{{-- resources/views/usuarios/create.blade.php --}}
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Crear Usuario
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white ring-1 ring-gray-200 shadow rounded-lg p-6 space-y-6">

        {{-- Título --}}
        <h3 class="text-lg font-semibold text-gray-700">Nuevo Usuario</h3>

        {{-- Errores de validación --}}
        @if($errors->any())
          <div class="p-4 bg-red-50 border border-red-200 rounded">
            <ul class="list-disc list-inside text-red-700 text-sm">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        {{-- Formulario --}}
        <form action="{{ route('usuarios.store') }}"
              method="POST"
              class="space-y-5">
          @csrf

          {{-- Nombre --}}
          <div>
            <label class="block text-sm font-medium text-gray-700">Nombre</label>
            <input
              type="text"
              name="name"
              value="{{ old('name') }}"
              required
              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md
                     focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            />
          </div>

          {{-- Email --}}
          <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input
              type="email"
              name="email"
              value="{{ old('email') }}"
              required
              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md
                     focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            />
          </div>

          {{-- Contraseña --}}
          <div>
            <label class="block text-sm font-medium text-gray-700">Contraseña</label>
            <input
              type="password"
              name="password"
              required
              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md
                     focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            />
          </div>

          {{-- Confirmar Contraseña --}}
          <div>
            <label class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
            <input
              type="password"
              name="password_confirmation"
              required
              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md
                     focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
            />
          </div>

          {{-- Rol --}}
          <div>
            <label class="block text-sm font-medium text-gray-700">Rol</label>
            <select
              name="role"
              required
              class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md
                     focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
              <option value="">-- selecciona un rol --</option>
              @foreach($roles as $rolName)
                <option value="{{ $rolName }}" @selected(old('role') == $rolName)>
                  {{ ucfirst(str_replace('_',' ',$rolName)) }}
                </option>
              @endforeach
            </select>
          </div>

          {{-- Acciones --}}
          <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
            <a
              href="{{ route('usuarios.index') }}"
              class="px-4 py-2 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-md
                     hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 transition"
            >Cancelar</a>
            <button
              type="submit"
              class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md
                     hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition"
            >Guardar</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</x-app-layout>
