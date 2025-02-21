@extends('layouts.designerHome')

@section('content')
<main class="flex-1 p-6">
    <p class="text-left text-5xl font-bold text-gray-900 dark:text-white">
        BIENVENIDO ADMINISTRADOR
    </p>
<br>
    <!-- Buscador Usuarios -->
    <div class="flex justify-between items-center mb-4">
    <div class="flex border rounded-lg overflow-hidden w-1/3">
        <input type="text" placeholder="Buscar Usuarios" class="px-4 py-2 w-full border-none outline-none">
        <button class="bg-gray-300 px-4 py-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.2-5.2m2.7-4.8a7 7 0 1 1-14 0 7 7 0 0 1 14 0z"></path>
            </svg>
        </button>
    </div>
</div>
<br>
<head>
        <!-- Lista Usuarios -->
    <div>
        <p class="text-center text-3xl font-bold text-gray-900 dark:text-white">
            LISTA DE USUARIOS
        </p>
<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-800">
    <div class="flex flex-col items-center pb-10">
        <br>
        <img class="w-24 h-24 mb-4 rounded-full shadow-lg" src="/docs/images/people/profile-picture-3.jpg" alt="Bonnie image"/>
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
        <div class="mt-auto text-sm">
            <p class="text-gray-700">Almacenamiento 50%</p>
            <div class="w-full bg-gray-300 rounded-full h-2 relative">
                <div class="bg-green-500 h-2 rounded-full" style="width: 50%;"></div>
            </div>
            <p class="text-gray-600 mt-1">10 Gb utilizados de 20 Gb</p>
        </div>
        <div class="flex mt-4 md:mt-6">
            <a href="adminuser" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Inspeccionar</a>
        </div>
    </div>
</div>
    </div>
        <!-- Lista premium -->
    <div>
        <p class="text-center text-3xl font-bold text-gray-900 dark:text-white">
            LISTA DE USUARIOS PREMIUM
        </p>
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-800">
            <div class="flex flex-col items-center pb-10">
                <br>
                <img class="w-24 h-24 mb-4 rounded-full shadow-lg" src="/docs/images/people/profile-picture-3.jpg" alt="Bonnie image"/>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Bonnie Green</h5>
                <div class="mt-auto text-sm">
                    <p class="text-gray-700">Almacenamiento 50%</p>
                    <div class="w-full bg-gray-300 rounded-full h-2 relative">
                        <div class="bg-green-500 h-2 rounded-full" style="width: 50%;"></div>
                    </div>
                    <p class="text-gray-600 mt-1">10 Gb utilizados de 20 Gb</p>
                </div>
                <div class="flex mt-4 md:mt-6">
                    <a href="adminuser" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Inspeccionar</a>
                </div>
            </div>
        </div>
        </div>
</head>

</main>
@endsection
