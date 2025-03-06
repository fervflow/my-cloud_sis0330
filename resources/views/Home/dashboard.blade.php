<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cloud</title>
    <link rel="icon" href="{{ asset('Img/Logo.ico') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body, html {
            margin: 0;
            padding: 0;
        }
        .plan {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }
        .plan:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .plan-header {
            background-color:  #5c15ea ;
            color: white;
            padding: 16px;
            border-radius: 8px 8px 0 0;
        }
        .plan-body {
            padding: 16px;
        }
        .plan-footer {
            padding: 16px;
            background-color: #f7fafc;
            border-radius: 0 0 8px 8px;
        }
        .plan-price {
            color:  #5c15ea ;
            font-weight: bold;
            font-size: 1.2rem;
        }
        .plan-storage {
            color: #5c15ea ;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-[#5c15ea]">
    <header class="bg-white text-[#5c15ea] p-4 shadow-md fixed w-full z-50 top-0 left-0">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-2 ml-0">
                <h1 class="text-2xl font-bold">
                    <span class="text-black">My</span>
                    <span class="text-[#5c15ea]">Cloud</span>
                </h1>
            </div>
            <nav class="flex-1 ml-auto">
                <ul class="flex justify-center space-x-6">
                    <li><a href="#features" class="hover:underline">Funciones</a></li>
                    <li><a href="#plans" class="hover:underline">Planes</a></li>
                    <li><a href="#contact" class="hover:underline">Contacto</a></li>
                </ul>
            </nav>
            <div class="flex space-x-4 ml-auto">
                <a href="{{ route('login') }}" class="bg-black text-white px-4 py-2 rounded-lg shadow-md font-semibold hover:bg-gray-600 transition">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="bg-[#5c15ea] text-white px-4 py-2 rounded-lg shadow-md font-semibold hover:bg-[#4a0db8] transition">Registrarse</a>
            </div>
        </div>
    </header>

    <section class="text-center py-24 bg-white text-[#5c15ea] mt-16">
        <img src="{{ asset('Img/logo.png') }}" class="h-32 mx-auto" alt="Mi Cloud Logo">
        <h2 class="text-black text-4xl font-bold mb-4">Almacenamiento en la nube seguro y rápido</h2>
        <p class="text-black text-lg">Guarda, accede y comparte tus archivos desde cualquier lugar.</p>
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
                @foreach ($planes as $plan)
                    <div class="plan">
                        <div class="plan-header">
                            <h3 class="text-xl font-semibold">{{ $plan->nombre }}</h3>
                        </div>
                        <div class="plan-body">
                            <p class="text-black plan-storage">{{ number_format($plan->almacenamiento / 1024, 2) }} GB</p>
                        </div>
                        <div class="plan-footer">
                            <p class="plan-price">Bs.{{ $plan->precio }}/{{ $plan->periodo_meses }} meses</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="contact" class="max-w-6xl mx-auto py-16 text-center text-white">
        <h2 class="text-3xl font-bold">Contáctanos</h2>
        <p class="mt-2">Si tienes alguna duda, contáctanos en <strong>contacto@UPDS.com</strong></p>
    </section>

    <footer class="bg-white text-gray-400 text-center py-4">
        <p>&copy; 2025 MyCloud. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
