<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud Storage</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body, html {
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body class="bg-purple-600">
    <header class="bg-white text-purple-600 p-4 shadow-md fixed w-full z-50 top-0 left-0">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2 ml-0">
                <img src="{{ asset('Img/logo.png') }}" class="h-12" alt="Mi Cloud Logo">
                <h1 class="text-2xl font-bold">MyCloud</h1>
            </div>
            <nav class="flex-1 ml-auto">
                <ul class="flex justify-center space-x-6">
                    <li><a href="#features" class="hover:underline">Funciones</a></li>
                    <li><a href="#plans" class="hover:underline">Planes</a></li>
                    <li><a href="#contact" class="hover:underline">Contacto</a></li>
                </ul>
            </nav>
            <div class="flex space-x-4 ml-auto">
                <a href="{{ route('login') }}" class="bg-purple-600 text-white px-4 py-2 rounded-lg shadow-md font-semibold hover:bg-purple-700 transition">Iniciar Sesión</a>
                <a href="#" class="bg-purple-600 text-white px-4 py-2 rounded-lg shadow-md font-semibold hover:bg-purple-700 transition">Registrarse</a>
            </div>
        </div>
    </header>

    <section class="text-center py-24 bg-white text-purple-600 mt-16">
        <h2 class="text-4xl font-bold mb-4">Almacenamiento en la nube seguro y rápido</h2>
        <p class="text-lg">Guarda, accede y comparte tus archivos desde cualquier lugar.</p>
        <a href="#plans" class="mt-6 inline-block bg-purple-600 text-white px-6 py-3 rounded-lg shadow-lg font-semibold hover:bg-purple-700 transition">Ver Planes</a>
    </section>

    <section id="features" class="max-w-6xl mx-auto py-16 px-6 grid md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <h3 class="text-xl font-semibold mb-2">Seguridad</h3>
            <p>Encriptación avanzada para proteger tus archivos.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <h3 class="text-xl font-semibold mb-2">Accesibilidad</h3>
            <p>Accede a tus archivos desde cualquier dispositivo.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <h3 class="text-xl font-semibold mb-2">Respaldo Automático</h3>
            <p>Guarda automáticamente tus archivos importantes.</p>
        </div>
    </section>

    <section id="plans" class="bg-gray-200 py-16">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">Nuestros Planes</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold">Gratis</h3>
                    <p>100GB de almacenamiento</p>
                    <p class="text-lg font-bold mt-2">$0/mes</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold">Pro</h3>
                    <p>1TB de almacenamiento</p>
                    <p class="text-lg font-bold mt-2">$9.99/mes</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold">Empresarial</h3>
                    <p>Almacenamiento ilimitado</p>
                    <p class="text-lg font-bold mt-2">$29.99/mes</p>
                </div>
            </div>
        </div>
    </section>
    <section id="contact" class="max-w-6xl mx-auto py-16 text-center text-white">
        <h2 class="text-3xl font-bold">Contáctanos</h2>
        <p class="mt-2">Si tienes alguna duda, contáctanos en <strong>contacto@cloudstorage.com</strong></p>
    </section>

    <footer class="bg-white text-purple-600 text-center py-4">
        <p>&copy; 2025 Cloud Storage. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
