@extends('layouts.designerHome')

@section('content')

<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="w-full max-w-4xl p-5">
        <h2 class="text-center text-2xl font-bold mb-2">Actualiza para aumentar el almacenamiento</h2>
        <p class="text-center text-gray-600 mb-6">Más espacio, beneficios adicionales</p>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            <!-- Plan 200GB -->
            <div class="bg-white p-5 rounded-lg shadow-md text-center">
                <h3 class="text-lg font-semibold">200 GB</h3>
                <p class="text-xl font-bold">Bs 15.00/mes</p>
                <button class="mt-3 text-blue-500 underline">Cambiar a un plan mensual</button>
                <ul class="mt-4 text-sm text-gray-600 space-y-2">
                    <li>✔ 200 GB de almacenamiento</li>
                    <li>✔ Expertos de Google</li>
                    <li>✔ Opción de agregar familia</li>
                    <li>✔ Beneficios adicionales para miembros</li>
                </ul>
            </div>

            <!-- Plan 500GB -->
            <div class="bg-white p-5 rounded-lg shadow-md text-center">
                <h3 class="text-lg font-semibold">500 GB</h3>
                <p class="text-xl font-bold">Bs 30.00/mes</p>
                <button class="mt-3 text-blue-500 underline">Cambiar a un plan mensual</button>
                <ul class="mt-4 text-sm text-gray-600 space-y-2">
                    <li>✔ 200 GB de almacenamiento</li>
                    <li>✔ Expertos de Google</li>
                    <li>✔ Opción de agregar familia</li>
                    <li>✔ Beneficios adicionales para miembros</li>
                </ul>
            </div>

            <!-- Plan 2TB (Recomendado) -->
            <div class="bg-white p-5 rounded-lg shadow-md border-2 border-blue-500 text-center">
                <h3 class="text-lg font-semibold">2 TB</h3>
                <p class="text-xl font-bold text-blue-600">Bs. 64.49/mes</p>
                <button class="mt-3 text-blue-500 underline">Cambiar a un plan mensual</button>
                <ul class="mt-4 text-sm text-gray-600 space-y-2">
                    <li>✔ 2 TB de almacenamiento</li>
                    <li>✔ Expertos de Google</li>
                    <li>✔ Opción de agregar familia</li>
                    <li>✔ Beneficios adicionales para miembros</li>
                </ul>
            </div>

             <!-- Plan 200GB -->
             <div class="bg-white p-5 rounded-lg shadow-md text-center">
                <h3 class="text-lg font-semibold">200 GB</h3>
                <p class="text-xl font-bold">Bs 139.00/anual</p>
                <button class="mt-3 text-blue-500 underline">Cambiar a un plan anual</button>
                <ul class="mt-4 text-sm text-gray-600 space-y-2">
                    <li>✔ 200 GB de almacenamiento</li>
                    <li>✔ Expertos de Google</li>
                    <li>✔ Opción de agregar familia</li>
                    <li>✔ Beneficios adicionales para miembros</li>
                </ul>
            </div>

            <!-- Plan 500GB -->
            <div class="bg-white p-5 rounded-lg shadow-md text-center">
                <h3 class="text-lg font-semibold">500 GB</h3>
                <p class="text-xl font-bold">Bs 299.00/anual</p>
                <button class="mt-3 text-blue-500 underline">Cambiar a un plan anual</button>
                <ul class="mt-4 text-sm text-gray-600 space-y-2">
                    <li>✔ 200 GB de almacenamiento</li>
                    <li>✔ Expertos de Google</li>
                    <li>✔ Opción de agregar familia</li>
                    <li>✔ Beneficios adicionales para miembros</li>
                </ul>
            </div>

            <!-- Plan 2TB (Recomendado) -->
            <div class="bg-white p-5 rounded-lg shadow-md border-2 border-blue-500 text-center">
                <h3 class="text-lg font-semibold">2 TB</h3>
                <p class="text-xl font-bold text-blue-600">Bs. 649.49/anual</p>
                <button class="mt-3 text-blue-500 underline">Cambiar a un plan anual</button>
                <ul class="mt-4 text-sm text-gray-600 space-y-2">
                    <li>✔ 2 TB de almacenamiento</li>
                    <li>✔ Expertos de Google</li>
                    <li>✔ Opción de agregar familia</li>
                    <li>✔ Beneficios adicionales para miembros</li>
                </ul>
            </div>

        </div>
    </div>

</body>


@endsection
