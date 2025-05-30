<x-app-layout>
  <x-slot name="header">
    <h2 class="font-bold text-xl">Asignar Roles</h2>
  </x-slot>

  <div class="p-6 max-w-md mx-auto">
    @if($errors->any())
      <div class="mb-4 p-2 bg-red-100 text-red-800">
        <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
      </div>
    @endif

    <form action="{{ route('usuarios.update',$usuario) }}" method="POST" class="space-y-4">
      @csrf @method('PUT')

      <div>
        <label class="block font-medium">Roles</label>
        @foreach($roles as $id => $desc)
          <label class="inline-flex items-center mr-4">
            <input type="checkbox" name="roles[]" value="{{ $id }}"
                   {{ in_array($id, $usuario->roles->pluck('id')->toArray()) ? 'checked':'' }}
                   class="form-checkbox">
            <span class="ml-2">{{ $desc }}</span>
          </label>
        @endforeach
      </div>

      <div class="flex justify-end space-x-2">
        <a href="{{ route('usuarios.index',$usuario) }}"
           class="px-4 py-2 bg-gray-300 rounded">Cancelar</a>
        <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded">
          Guardar
        </button>
      </div>
    </form>
  </div>
</x-app-layout>
