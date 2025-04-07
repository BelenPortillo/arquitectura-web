<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>TaskManager PRO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Estilos personalizados -->
  <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>
<body class="bg-light">

  <!-- Menú superior -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">TaskManager PRO</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="{{ url('/tareas') }}">Tareas</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/usuarios') }}">Usuarios</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/subtareas') }}">Subtareas</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Contenido principal -->
  <div class="container mt-5 mb-5">
    @yield('contenido')
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
