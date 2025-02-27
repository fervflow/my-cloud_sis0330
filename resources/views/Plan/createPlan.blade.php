@extends('layouts.designerHome')

@section('content')
<body>
    <div class="w-full max-w-4xl p-5">
        <h1 class="text-center text-2xl font-bold mb-2">Crear Planes</h1>
        @if($usuario)
            <p>Bienvenido, {{ $usuario->name }}!</p>
        @endif
        <!-- Formulario para crear plan -->
        <form action="{{ route('plan.store') }}" method="POST">
            @csrf  <!-- CSRF Token para protección -->

            <div class="mb-6">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div class="mb-6">
                <label for="precio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor del Plan:</label>
                <input type="number" step="0.01" id="precio" name="precio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div class="mb-6">
                <label for="almacenamiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad de espacio:</label>
                <input type="number" step="0.01" id="almacenamiento" name="almacenamiento" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div class="mb-6">
                <label for="periodo_meses" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Periodo en meses:</label>
                <input type="number" id="periodo_meses" name="periodo_meses" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>

            <div class="mb-6">
                <label for="esta_activo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Activo:</label>
                <input type="checkbox" id="esta_activo" name="esta_activo" class="block w-6 h-6">
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white p-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Crear
            </button>
        </form>
    </div>
</body>
@endsection
