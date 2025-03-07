<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="icon" href="{{ asset('Img/Logo.ico') }}" type="image/x-icon">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="max-w-4xl w-full bg-white shadow-lg rounded-lg flex overflow-hidden">
    <!-- Sección de la imagen (logo) -->
    <div class="w-1/2 bg-[#5c15ea] flex items-center justify-center p-8 flex-col">
        <img src="{{ asset('Img/Logo1.png') }}" class="h-40 mx-auto" alt="Mi Cloud Logo">
        <h1 class="text-white text-4xl font-bold mt-4">MY CLOUD</h1>
    </div>

    <!-- Sección del formulario de login -->
    <div class="w-1/2 p-8">
      <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Iniciar sesión</h2>

      <form action="/login" method="POST">
        @csrf
        <!-- Campo de correo electrónico -->
        <div class="mb-4">
          <label for="correo" class="block text-gray-700">Correo electrónico</label>
          <input type="email" id="correo" name="correo" required
            class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 mt-2">
        </div>

        <!-- Campo de contraseña -->
        <div class="mb-6">
          <label for="password" class="block text-gray-700">Contraseña</label>
          <input type="password" id="password" name="password" required
            class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 mt-2">
        </div>

        <!-- Botones de Ingresar y Registrarse -->
        <div class="flex justify-between items-center">
          <button type="submit"
            class="w-full bg-[#5c15ea] text-white p-3 rounded-md hover:bg-[#4a0db8] focus:outline-none focus:ring-2 focus:ring-blue-500">
            Ingresar
          </button>
        </div>

      </form>
      <div class="footer mt-3">
        <p>¿No tienes cuenta? <a href="/register" class="text-blue-500 hover:text-blue-700 font-semibold">Regístrate aquí</a></p>
    </div>
    </div>
  </div>
  @include('sweetalert::sweetalert')

</body>
</html>
