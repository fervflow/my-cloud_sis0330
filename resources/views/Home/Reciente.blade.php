@extends('layouts.designerHome')

@section('content')

<h1>Mis Archivos Recientes</h1>


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

@endsection
