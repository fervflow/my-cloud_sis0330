@extends('layouts.designerHome')

@section('content')

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-2xl font-semibold text-center mb-4">Formulario de carga de archivos</h2>

        <form class="space-y-4">
            <!-- Nombre Completo -->
            <div class="flex space-x-2">
                <div class="w-1/2">
                    <label class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" id="fileName" value="{{ $nombre }}" class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-200" readonly>
                </div>
                <div class="w-1/2">
                    <label class="block text-sm font-medium text-gray-700">Ruta</label>
                    <input type="text" id="filePath" value="{{ $ruta }}" class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-200" readonly>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Tamaño</label>
                <label id="fileSize" class="block text-sm font-medium text-gray-700">{{ number_format($tamano / 1024 / 1024, 2) }} MB</label>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Carga de archivo</label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                    <input type="file" id="fileInput" class="hidden">
                    <label for="fileInput" class="cursor-pointer text-blue-500 hover:underline">
                        Buscar archivos
                    </label>
                    <p class="text-sm text-gray-500">Arrastre y suelte archivos aquí</p>
                </div>
            </div>


        </form>
    </div>
    <script>
        document.getElementById('fileInput').addEventListener('change', function(event) {
            let file = event.target.files[0];
            if (file) {
                document.getElementById('fileName').value = file.name;
                document.getElementById('filePath').value = event.target.value;
                document.getElementById('fileSize').textContent = (file.size / 1024 / 1024).toFixed(2) + ' MB';
            }
        });
    </script>
</body>

@endsection
