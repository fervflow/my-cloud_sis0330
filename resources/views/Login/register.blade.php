<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <!-- Vincula el archivo de Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="max-w-lg w-full bg-white shadow-lg rounded-lg p-8">
    <!-- Título -->
    <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">CREAR CUENTA</h2>
    <form action="/register" method="POST">
        @csrf
      <!-- Campo de nombres -->
      <div class="mb-4">
        <label for="nombres" class="block text-gray-700">Nombres</label>
        <input type="text" id="nombres" name="nombres" required
          class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 mt-2">
      </div>

      <!-- Campo de apellidos -->
      <div class="mb-4">
        <label for="apellidos" class="block text-gray-700">Apellidos</label>
        <input type="text" id="apellidos" name="apellidos" required
          class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 mt-2">
      </div>

      <!-- Campo de correo electrónico -->
      <div class="mb-4">
        <label for="correo" class="block text-gray-700">Correo electrónico</label>
        <input type="email" id="correo" name="correo" required
          class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 mt-2">
      </div>

      <!-- Campo de contraseña -->
      <div class="mb-4">
        <label for="password" class="block text-gray-700">Contraseña</label>
        <input type="password" id="password" name="password" required
          class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 mt-2">
      </div>
      <div class="mb-4">
        <label for="password_confirmation" class="block text-gray-700">Confirmar contraseña</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required
          class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 mt-2">
      </div>

      <!-- Botón de registro -->
      <div class="mt-6">
        <button type="submit"
          class="w-full bg-blue-500 text-white p-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
          Registrar
        </button>
      </div>

      <div class="mt-4 text-center">
        <span class="text-gray-600">¿Ya tienes una cuenta?</span>
        <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Iniciar sesión</a>
      </div>
    </form>
  </div>

</body>

</html>
