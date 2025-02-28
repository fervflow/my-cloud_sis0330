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
                    <input type="text" class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-200">
                </div>
                <div class="w-1/2">
                    <label class="block text-sm font-medium text-gray-700">ruta</label>
                    <input type="text" class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-200">
                </div>
            </div>

            <!-- tamaño -->
            <div>
                <label class="block text-sm font-medium text-gray-700">tamaño: </label>
                <label class="block text-sm font-medium text-gray-700">00.0</label>

            </div>

            <!-- Carga de archivo -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Carga de archivo</label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
                    <input type="file" class="hidden" id="fileInput">
                    <label for="fileInput" class="cursor-pointer text-blue-500 hover:underline">
                        Buscar archivos
                    </label>
                    <p class="text-sm text-gray-500">Arrastre y suelte archivos aquí</p>
                </div>
            </div>

            <!-- Botón de Enviar -->
            <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-md hover:bg-green-600">
                Enviar
            </button>
        </form>
    </div>
</body>

@endsection
