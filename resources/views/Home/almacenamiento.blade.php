@extends('layouts.designerHome')

@section('content')

<div class="text-center mt-6 px-4">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">MI ALMACENAMIENTO</h2>

    <div class="mt-4 w-full">
        <div class="bg-gray-300 rounded-full h-3 relative">
            <div class="bg-green-500 h-3 rounded-full transition-all" style="width: {{ ($usuario->espacio_total > 0) ? (($usuario->espacio_total - $usuario->espacio_disponible) / $usuario->espacio_total) * 100 : 0 }}%;"></div>
        </div>
        <p class="text-gray-600 mt-2 text-sm">
            <span class="font-medium">{{ number_format($usuario->espacio_total - $usuario->espacio_disponible, 2) }} MB</span> usados de
            <span class="font-medium">{{ number_format($usuario->espacio_total, 2) }} MB</span> ({{ number_format(($usuario->espacio_total - $usuario->espacio_disponible) / $usuario->espacio_total * 100, 2) }}% usado)
        </p>
    </div>

    <div class="mt-6 overflow-hidden bg-white shadow-lg rounded-lg border border-gray-200">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-gray-700">
                <tr>
                    <th class="p-4 text-sm font-medium">Nombre</th>
                    <th class="p-4 text-sm font-medium">Última modificación</th>
                    <th class="p-4 text-sm font-medium">Tamaño Archivo</th>
                    <th class="p-4 text-sm font-medium"></th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700">
                @forelse($archivosUsuario as $archivoUsuario)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors">
                        <td class="p-4">{{ $archivoUsuario->archivo->nombre }}</td>
                        <td class="p-4">{{ $archivoUsuario->archivo->updated_at->format('d M Y') }}</td>
                        <td class="p-4">{{ number_format($archivoUsuario->archivo->tamanio / 1048576, 2) }} MB</td>
                        <td class="p-4 text-right">
                            <a href="{{ route('archivo.descargar', $archivoUsuario->archivo->id_archivo) }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">Descargar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">No hay archivos subidos</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
