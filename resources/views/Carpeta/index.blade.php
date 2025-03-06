@extends('layouts.designerHome')

@section('content')

<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-4xl p-5">
        <h2 class="text-center text-2xl font-bold mb-2">Gestión de Carpetas</h2>
        <p class="text-center text-gray-600 mb-6">Aquí puedes gestionar todas tus carpetas.</p>

        <!-- Botón para crear nueva carpeta -->
        <div class="text-right mb-4">
            <button
                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600"
                onclick="openModal()">
                Crear Nueva Carpeta
            </button>
        </div>

        <!-- Lista de carpetas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($carpetas as $carpeta)
                <div class="bg-white p-5 rounded-lg shadow-md text-center">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $carpeta->nombre }}</h3>
                    <p class="text-gray-600">Fecha de creación: {{ $carpeta->created_at->format('d-m-Y') }}</p>
                    <!-- Botones de acción como editar o eliminar si es necesario -->
                    <div class="mt-4 space-x-2">
                        <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Editar</button>
                        <button class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">Eliminar</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

<!-- Modal para Crear Carpeta -->
<div id="createFolderModal" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center" aria-labelledby="createFolderModalLabel" role="dialog" aria-hidden="true">
    <div class="bg-white p-8 rounded-lg shadow-md w-1/3">
        <h3 id="createFolderModalLabel" class="text-xl font-semibold text-gray-800 mb-4">Crear Nueva Carpeta</h3>

        <!-- Formulario para crear carpeta -->
        <form action="{{ route('carpeta.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre de la Carpeta</label>
                <input type="text" id="nombre" name="nombre" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="flex justify-between">
                <button type="button" onclick="closeModal()" class="py-2 px-4 bg-gray-500 text-white rounded">Cancelar</button>
                <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded">Crear Carpeta</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Función para abrir el modal
    function openModal() {
        document.getElementById("createFolderModal").classList.remove("hidden");
        document.getElementById("createFolderModal").setAttribute("aria-hidden", "false");  // Añadimos accesibilidad
    }

    // Función para cerrar el modal
    function closeModal() {
        document.getElementById("createFolderModal").classList.add("hidden");
        document.getElementById("createFolderModal").setAttribute("aria-hidden", "true");  // Añadimos accesibilidad
    }
</script>

@endsection
