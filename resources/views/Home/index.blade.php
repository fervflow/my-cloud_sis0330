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
                @forelse($archivosUsuario as $archivoUsuario)
                    <tr class="bg-gray-100">
                        <td class="p-2">{{ $archivoUsuario->archivo->nombre }}</td>
                        <td class="p-2">{{ $archivoUsuario->archivo->updated_at->format('d M Y') }}</td>
                        <td class="p-2">{{ number_format($archivoUsuario->archivo->tamanio / 1048576, 2) }} MB</td>
                        <td class="p-2">⋮</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-2 text-center">No hay archivos subidos</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>

@endsection
