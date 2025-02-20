<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="flex bg-white rounded-lg shadow-lg overflow-hidden w-full max-w-4xl">
        <!-- Imagen al lado izquierdo -->
        <div class="w-1/2 flex items-center justify-center bg-gray-50">
            <img src="{{ asset('Img/logo.png') }}" class="h-40" alt="Mi Cloud Logo">
            <!-- Ajusta el tamaño de la imagen con la clase `h-40` (o el valor que prefieras) -->
        </div>

        <!-- Formulario de login al lado derecho -->
        <div class="w-1/2 p-8">
            <h2 class="text-2xl font-bold mb-2 text-center">Iniciar Sesión</h2>
            <span class="block text-center text-gray-600 mb-6">Bienvenido, por favor ingresa tus credenciales</span>
            <form action="#" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="usuario" class="block text-gray-700">Usuario</label>
                    <input type="text" id="usuario" name="usuario" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700">Contraseña</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <button type="submit" class="w-full bg-purple-600   text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Ingresar
                </button>
            </form>
            <div class="mt-4 text-center">
                <a href="#" class="text-blue-500 hover:text-blue-700">Registrar nuevo usuario</a>
            </div>
        </div>
    </div>
</body>
</html>
