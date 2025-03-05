@extends('layouts.designerHome')

@section('content')

MI ALMACENAMIENTO
<div class="mt-auto text-sm">
    <div class="w-full bg-gray-300 rounded-full h-2 relative">
        <div class="bg-green-500 h-2 rounded-full" style="width: {{ ($usuario->espacio_total > 0) ? ($usuario->espacio_disponible / $usuario->espacio_total) * 100 : 0 }}%;"></div>
    </div>
    <p class="text-gray-600 mt-1">
        {{ number_format($usuario->espacio_disponible, 2) }} MB disp. de
        {{ number_format($usuario->espacio_total, 2) }} MB
    </p>
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

                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-2 text-center">No hay archivos subidos</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection
