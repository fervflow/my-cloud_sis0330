@extends('layouts.designerHome')

@section('content')


<body class="flex items-center justify-center h-screen bg-gray-100">

    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <!-- Encabezado -->
        <div class="flex justify-between items-center mb-3">
            <button class="text-gray-500 hover:text-gray-700">
                <svg class="w-[31px] h-[31px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                  </svg>
            </button>
        </div>

        <!-- Título -->
        <h2 class="text-xl font-bold">Compartir</h2>
        <p class="text-gray-500 text-sm mb-4">--Nombre del Archivo--</p>

        <!-- Input -->
        <input type="text" placeholder="Usuario o Correo Electrónico"
            class="w-full p-2 border rounded-lg bg-gray-100 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">

        <!-- Sugerencias -->
        <p class="text-gray-600 text-sm mt-3">Sugerencias de usuarios</p>
        <div class="w-full h-16 bg-gray-200 rounded-lg mt-1"></div>

        <!-- Botones -->
        <div class="flex justify-between mt-4">
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Copiar Link</button>
            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Compartir</button>
        </div>
    </div>
</body>

@endsection
