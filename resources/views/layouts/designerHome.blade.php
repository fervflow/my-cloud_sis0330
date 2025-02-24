<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cloud</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white p-4 shadow-md flex flex-col">
            <div class="flex items-center mb-6">
                <img src="{{ asset('Img/logo.png') }}" class="h-20 mx-auto" alt="Mi Cloud Logo">
            </div>
            <nav class="flex-1">
                <ul>
                    <li class="mb-4">
                        <a href="#" class="flex items-center text-gray-700 hover:bg-gray-200 rounded-lg px-2 py-1">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10l1-1m0 0l7-7m-7 7h11m4 0a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V10a2 2 0 012-2h11m0 0l-1 1"></path></svg>
                            Crear carpeta
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="flex items-center text-gray-700 hover:bg-gray-200 rounded-lg px-2 py-1">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
                            Subir archivo
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="flex items-center text-gray-700 hover:bg-gray-200 rounded-lg px-2 py-1">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18m-9 5h9"></path></svg>
                            Subir carpeta
                        </a>
                    </li>
                    <br>
                    <li class="mb-4">
                        <a href="#" class="flex items-center text-gray-700 hover:bg-gray-200 rounded-lg px-2 py-1">
                            <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                            </svg>
                            Reciente
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="flex items-center text-gray-700 hover:bg-gray-200 rounded-lg px-2 py-1">
                            <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm-1 9a1 1 0 1 0-2 0v2a1 1 0 1 0 2 0v-2Zm2-5a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1Zm4 4a1 1 0 1 0-2 0v3a1 1 0 1 0 2 0v-3Z" clip-rule="evenodd"/>
                            </svg>
                            Almacenamiento
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="mt-auto text-sm">
                <p class="text-gray-700">Almacenamiento 50%</p>
                <div class="w-full bg-gray-300 rounded-full h-2 relative">
                    <div class="bg-green-500 h-2 rounded-full" style="width: 50%;"></div>
                </div>
                <p class="text-gray-600 mt-1">10 Gb utilizados de 20 Gb</p>
                <button class="mt-3 w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-900 transition duration-300">
                    Obtener más almacenamiento
                </button>
            </div>
        </aside>
        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="btn btn-danger">Cerrar sesión</button>
        </form>
        <!-- Main Content -->
        @yield('content')
    </div>
</body>
</html>
