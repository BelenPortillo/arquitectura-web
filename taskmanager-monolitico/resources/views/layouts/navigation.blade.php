<nav class="bg-white border-b border-gray-200 shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="text-indigo-600 font-bold text-lg">Task Manager</a>
            </div>

            <!-- Navegación -->
            <div class="flex space-x-6 items-center">
                <a href="{{ route('dashboard') }}" class="text-sm text-gray-700 hover:text-indigo-600">Inicio</a>
                <a href="{{ route('tareas.index') }}" class="text-sm text-gray-700 hover:text-indigo-600">Tareas</a>
                @if(Auth::user()->hasRole('administrador'))
                    <a href="{{ route('usuarios.index') }}" class="text-sm text-gray-700 hover:text-indigo-600">Usuarios</a>
                @endif
            </div>

            <!-- Perfil -->
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-600">{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-sm text-red-600 hover:underline">Salir</button>
                </form>
            </div>
        </div>
    </div>
</nav>
