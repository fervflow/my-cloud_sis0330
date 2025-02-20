@extends('layouts.designerHome')

@section('content')

    <main class="flex-1 p-6">
        <div class="flex justify-between items-center mb-4">
            <div class="flex border rounded-lg overflow-hidden w-1/3">
                <input type="text" placeholder="Buscar" class="px-4 py-2 w-full border-none outline-none">
                <button class="bg-gray-300 px-4 py-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.2-5.2m2.7-4.8a7 7 0 1 1-14 0 7 7 0 0 1 14 0z"></path>
                    </svg>
                </button>
            </div>
            <div class="flex items-center gap-3">
                <button>
                    <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.529 9.988a2.502 2.502 0 1 1 5 .191A2.441 2.441 0 0 1 12 12.582V14m-.01 3.008H12M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                </button>
                <button class="bg-purple-600 text-white px-4 py-2 rounded-lg">E</button>
            </div>
        </div>
        <h1 class="text-2xl font-bold text-gray-500 mb-4">MI ALMACENAMIENTO</h1>
        <div class="bg-white shadow-md p-4 rounded-lg">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b">
                        <th class="p-2">Nombre</th>
                        <th class="p-2">Última modificación</th>
                        <th class="p-2">Tamaño Archivo</th>
                        <th class="p-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-gray-100">
                        <td class="p-2">Documento word</td>
                        <td class="p-2">14 febrero 2024</td>
                        <td class="p-2">20 Bytes</td>
                        <td class="p-2">⋮</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

@endsection
