@extends('layouts.designerHome')

@section('content')
<main class="flex-1 p-6">
<div>
    <a href="admin">
        <svg class="w-[42px] h-[42px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path d="M14.502 7.046h-2.5v-.928a2.122 2.122 0 0 0-1.199-1.954 1.827 1.827 0 0 0-1.984.311L3.71 8.965a2.2 2.2 0 0 0 0 3.24L8.82 16.7a1.829 1.829 0 0 0 1.985.31 2.121 2.121 0 0 0 1.199-1.959v-.928h1a2.025 2.025 0 0 1 1.999 2.047V19a1 1 0 0 0 1.275.961 6.59 6.59 0 0 0 4.662-7.22 6.593 6.593 0 0 0-6.437-5.695Z"/>
          </svg>

        </a>

</div>

    <p class="text-left text-5xl font-bold text-gray-900 dark:text-white">
        BIENVENIDO ADMINISTRADOR
    </p>
<br>
<head>
        <!-- Lista Usuarios -->
    <div>
        <p class="text-center text-3xl font-bold text-gray-900 dark:text-white">
            DATOS DE USUARIO
        </p>


<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-800">
    <div>
        dasfaf
    </div>

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
            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Inspeccionar</a>
        </div>
    </div>
</div>
    </div>
</head>

</main>
@endsection
