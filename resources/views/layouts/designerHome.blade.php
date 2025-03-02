<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cloud</title>
    <link rel="icon" href="{{ asset('Img/Logo.ico') }}" type="image/x-icon">
    <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <aside class="w-64 bg-white p-4 shadow-md flex flex-col">
            <div class="flex items-center mb-6">
                <img src="{{ asset('Img/logo.png') }}" class="h-20 mx-auto" alt="Mi Cloud Logo">
            </div>

            <div class="text-center mb-5">
                <p class="text-gray-800 font-semibold">Usuario: {{ auth()->user()->nombres }} {{ auth()->user()->apellidos }}</p>
            </div>

            <nav class="flex-1">
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('home.index') }}" class="flex items-center text-gray-700 hover:bg-gray-200 rounded-lg px-2 py-1">
                            <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5"/>
                              </svg>
                            Página Principal
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="#" class="flex items-center text-gray-700 hover:bg-gray-200 rounded-lg px-2 py-1">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10l1-1m0 0l7-7m-7 7h11m4 0a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V10a2 2 0 012-2h11m0 0l-1 1"></path></svg>
                            Crear carpeta
                        </a>
                    </li>
                    <li class="mb-4">
                        <button onclick="document.getElementById('fileInput').click()" class="mt-3 flex items-center text-gray-800 hover:bg-gray-200 rounded-lg px-2 py-1">
                            <svg class="w-6 h-6 mr-2 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
                            </svg>
                            Subir Archivo
                        </button>
                        <form id="fileForm" action="{{ route('archivo.subir') }}" method="POST" enctype="multipart/form-data" class="hidden">
                            @csrf
                            <input type="file" id="fileInput" name="archivo" class="hidden">
                        </form>
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

                    <li class="mb-4">
                        @if(auth()->user() && auth()->user()->rol === 'admin')
                            <a href="{{ route('admin') }}" class="flex items-center text-gray-700 hover:bg-gray-200 rounded-lg px-2 py-1">
                                <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                                  </svg>

                                Usuarios
                            </a>
                        @endif
                    </li>

                    <li class="mb-4">
                        @if(auth()->user() && auth()->user()->rol === 'admin')
                        <a href="{{ route('plan.create') }}" class="flex items-center text-gray-700 hover:bg-gray-200 rounded-lg px-2 py-1">
                            <svg class="w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                              </svg>

                                Crear Plan
                            </a>
                        @endif
                    </li>

                </ul>
            </nav>
            <div class="mt-auto text-sm">
                <div class="w-full bg-gray-300 rounded-full h-2 relative">
                    <div class="bg-green-500 h-2 rounded-full" style="width: {{ ($usuario->espacio_total > 0) ? ($usuario->espacio_utilizado / $usuario->espacio_total) * 100 : 0 }}%;"></div>
                </div>
                <p class="text-gray-600 mt-1">
                    {{ number_format($usuario->espacio_utilizado, 2) }} GB utilizados de
                    {{ number_format($usuario->espacio_total, 2) }} GB
                </p>

                <a href="{{ route('plan.index') }}">
                    <button class="mt-3 w-full bg-[#5c15ea] text-white py-2 rounded-lg hover:bg-[#4a0db8] transition duration-300">
                        Obtener más almacenamiento
                    </button>
                </a>

            </div>

        </aside>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-5xl font-bold text-left flex items-center">
                    <span class="text-black">MY</span>
                    <span class="text-[#5c15ea]">CLOUD</span>
                </h1>
                <div class="flex items-center gap-3">
                    <button>
                        <a href="{{ route('home.terminosCondiciones') }}" target="_blank">
                            <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.529 9.988a2.502 2.502 0 1 1 5 .191A2.441 2.441 0 0 1 12 12.582V14m-.01 3.008H12M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                        </a>
                    </button>
                    <button id="userButton" class="bg-[#5c15ea] text-white w-10 h-10 flex items-center justify-center rounded-full">
                        {{ strtoupper(substr($usuario->nombres, 0, 1)) }}
                    </button>
                </div>
            </div>
            @yield('content')
        </div>
    </div>


    <div id="userModal" class="absolute top-14 right-4 bg-white p-6 rounded-lg shadow-lg w-80 text-center flex-col items-center hidden">
        <button type="button" id="closeModal" class="btn-close absolute bottom-0 right-2 top-2"></button>
        <h3 class="text-gray-500 text-sm mb-3">{{ $usuario->correo }}</h3>
        <div class="bg-[#5c15ea] text-white w-20 h-20 flex items-center justify-center rounded-full text-4xl font-bold mt-2">
            {{ strtoupper(substr($usuario->nombres, 0, 1)) }}
        </div>
        <h2 class="text-lg font-bold mt-3">¡Hola, {{ $usuario->nombres }}!</h2>
        <div class="mt-4 w-full">
            <a href="#" class="w-full py-2 text-[#5c15ea] font-semibold hover:bg-gray-200 rounded-md">
                Editar perfil
            </a>
            <form action="{{ route('logout') }}" method="POST" class="mt-2">
                @csrf
                <button type="submit" class="w-full py-2 bg-red-600 text-white font-semibold mt-2 rounded-md hover:bg-red-700">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>

    <!-- Modal para Confirmar el Archivo -->
    <div id="fileModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h3 class="text-lg font-semibold">Confirmar archivo</h3>
            <p>Nombre: <span id="fileName"></span></p>
            <p>Tamaño: <span id="fileSize"></span> MB</p>
            <p>Tipo: <span id="fileType"></span></p>
            <div class="flex items-center mt-4">
                <input type="checkbox" id="expirationCheckbox" class="mr-2">
                <label for="expirationCheckbox">Fecha de expiración</label>
            </div>
            <div id="expirationDateDiv" class="hidden mt-4">
                <label for="expirationDate" class="block">Fecha de expiración</label>
                <input type="date" id="expirationDate" name="fecha_expiracion" class="mt-2 border border-gray-300 rounded px-3 py-2 w-full">
            </div>
            <button id="confirmUpload" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Confirmar</button>
            <button id="cancelUpload" class="bg-gray-500 text-white px-4 py-2 rounded mt-4 ml-2">Cancelar</button>
        </div>
    </div>




    <script>
        document.getElementById('fileInput').addEventListener('change', function(event) {
            var file = event.target.files[0];
            if (file) {
                document.getElementById('fileName').textContent = file.name;
                document.getElementById('fileSize').textContent = (file.size / 1024 / 1024).toFixed(2);
                document.getElementById('fileType').textContent = file.type;
                document.getElementById('fileModal').classList.remove('hidden');
                document.getElementById('fileModal').classList.add('flex');
            }
        });
        document.getElementById('confirmUpload').addEventListener('click', function() {
            var file = document.getElementById('fileInput').files[0];
            var hasExpiration = document.getElementById('expirationCheckbox').checked;
            var expirationDate = hasExpiration ? document.getElementById('expirationDate').value : null;
            var form = document.getElementById('fileForm');
            var inputFile = form.querySelector('input[name="archivo"]');
            inputFile.files = document.getElementById('fileInput').files;
            if (expirationDate) {
                var expirationInput = document.createElement('input');
                expirationInput.type = 'hidden';
                expirationInput.name = 'fecha_expiracion';
                expirationInput.value = expirationDate;
                form.appendChild(expirationInput);
            }
            form.submit();
        });


        document.getElementById('expirationCheckbox').addEventListener('change', function() {
            var expirationDateDiv = document.getElementById('expirationDateDiv');
            if (this.checked) {
                expirationDateDiv.classList.remove('hidden');
            } else {
                expirationDateDiv.classList.add('hidden');
            }
        });
        document.getElementById('cancelUpload').addEventListener('click', function() {
            document.getElementById('fileModal').classList.add('hidden');
        });
    </script>

    <script>
        document.getElementById('userButton').addEventListener('click', function() {
            let modal = document.getElementById('userModal');
            modal.classList.toggle('hidden');
            modal.classList.add('flex');
        });
        document.getElementById('closeModal').addEventListener('click', function() {
            const modal = document.getElementById('userModal');
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        });
        document.addEventListener('click', function(event) {
            let modal = document.getElementById('userModal');
            let button = document.getElementById('userButton');

            if (!modal.contains(event.target) && !button.contains(event.target)) {
                modal.classList.add('hidden');
            }
        });
    </script>
    <script>
        function submitForm() {
            document.getElementById('fileForm').submit();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
