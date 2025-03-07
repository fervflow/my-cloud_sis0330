@extends('layouts.designerHome')

@section('content')

<main class="flex-1 p-6">
    <div class="flex justify-between items-center mb-6">
        <div class="flex border rounded-lg overflow-hidden w-1/3 shadow-md">
            <form method="GET" action="{{ route('home.index') }}" class="flex w-full">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar archivo"
                       class="px-4 py-3 w-full border-none outline-none text-gray-800 bg-gray-100 focus:ring-2 focus:ring-[#5c15ea] rounded-l-lg">
                <button type="submit" class="bg-[#5c15ea] px-4 py-3 text-white hover:bg-[#4b0ca1] rounded-r-lg transition duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 21l-5.2-5.2m2.7-4.8a7 7 0 1 1-14 0 7 7 0 0 1 14 0z"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
    <h1 class="text-3xl font-semibold text-gray-700 mb-6">MI ALMACENAMIENTO</h1>
    <div class="bg-white shadow-lg p-4 rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Mis Archivos</h2>
        <table class="w-full text-left table-auto">
            <thead>
                <tr class="border-b bg-gray-50">
                    <th class="p-3 text-sm font-medium text-gray-600">Nombre</th>
                    <th class="p-3 text-sm font-medium text-gray-600">Última modificación</th>
                    <th class="p-3 text-sm font-medium text-gray-600">Tamaño Archivo</th>
                    <th class="p-3 text-sm font-medium text-gray-600">Compartido con:</th>
                    <th class="p-3 text-sm font-medium text-gray-600"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($archivosPropios as $archivoUsuario)
                    <tr class="border-b hover:bg-gray-50 transition duration-200">
                        <td class="p-3 text-sm text-gray-800">
                            {{ $archivoUsuario->archivo->nombre }}
                            @if($archivoUsuario->archivo->fecha_expiracion)
                                <svg class="w-6 h-6 inline-block ml-2 text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                </svg>
                            @endif
                        </td>
                        <td class="p-3 text-sm text-gray-800">{{ $archivoUsuario->archivo->updated_at->format('d M Y') }}</td>
                        <td class="p-3 text-sm text-gray-600">{{ number_format($archivoUsuario->archivo->tamanio / 1048576, 2) }} MB</td>
                        <td>
                            @if($archivoUsuario->correosCompartidos)
                                <div class="text-sm text-gray-500 mt-1">
                                    {{ $archivoUsuario->correosCompartidos }}
                                </div>
                            @endif
                        </td>
                        <td class="p-3 text-center relative">
                            <button onclick="toggleMenu(this)" class="options-btn text-[#5c15ea] hover:text-[#4b0ca1]">⋮</button>
                            <div class="options-menu hidden absolute right-0 bg-white shadow-md rounded-lg p-2 w-48 mt-2">
                                <a href="{{ route('archivo.descargar', $archivoUsuario->archivo->id_archivo) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                    <svg class="w-5 h-5 text-gray-700 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01"/>
                                    </svg>
                                    Descargar
                                </a>
                                <button class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center" onclick="mostrarModalCompartir({{ $archivoUsuario->archivo->id_archivo }})">
                                    <svg class="w-5 h-5 text-gray-700 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                    </svg>
                                    Compartir
                                </button>
                                <button class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center" onclick="mostrarModalFechaExpiracion({{ $archivoUsuario->archivo->id_archivo }})">
                                    <svg class="w-5 h-5 text-gray-700 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5" />
                                    </svg>
                                    Agregar Fecha de Expiración
                                </button>
                                <button class="block px-4 py-2 text-sm text-red-600 hover:bg-red-100 flex items-center" onclick="eliminarArchivo({{ $archivoUsuario->archivo->id_archivo }})">
                                    <svg class="w-5 h-5 text-red-600 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                    </svg>
                                    Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-3 text-center text-gray-500">No hay archivos subidos</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Archivos Compartidos</h2>
        <table class="w-full text-left table-auto">
            <thead>
                <tr class="border-b bg-gray-50">
                    <th class="p-3 text-sm font-medium text-gray-600">Nombre</th>
                    <th class="p-3 text-sm font-medium text-gray-600">Última modificación</th>
                    <th class="p-3 text-sm font-medium text-gray-600">Tamaño Archivo</th>
                    <th class="p-3 text-sm font-medium text-gray-600"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($archivosCompartidos as $archivoCompartido)
                    <tr class="border-b hover:bg-gray-50 transition duration-200">
                        <td class="p-3 text-sm text-gray-800">
                            {{ $archivoCompartido->archivo->nombre }}
                            @if($archivoCompartido->archivo->fecha_expiracion)
                                <svg class="w-6 h-6 inline-block ml-2 text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                </svg>
                            @endif
                        </td>
                        <td class="p-3 text-sm text-gray-600">{{ $archivoCompartido->archivo->updated_at->format('d M Y') }}</td>
                        <td class="p-3 text-sm text-gray-600">{{ number_format($archivoCompartido->archivo->tamanio / 1048576, 2) }} MB</td>
                        <td class="p-4 text-right">
                            <a href="{{ route('archivo.descargar', $archivoCompartido->archivo->id_archivo) }}" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">Descargar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-3 text-center text-gray-500">No tienes archivos compartidos.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</main>
<div id="modalCompartir" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-semibold mb-4">Compartir Archivo</h2>
        <form id="formCompartir" action="{{ route('archivo.compartir') }}" method="POST">
            @csrf
            <input type="hidden" id="archivoId" name="archivoId">
            <div class="mb-4">
                <label for="correo" class="block text-sm text-gray-600">Correo Electrónico</label>
                <input type="email" id="correo" name="correo" class="px-4 py-2 w-full border rounded-lg" placeholder="Introduce el correo del destinatario" required>
            </div>
            <button type="submit" class="bg-[#5c15ea] text-white px-4 py-2 rounded-lg w-full">Compartir</button>
            <button type="button" onclick="cerrarModal()" class="bg-red-500 text-white px-4 py-2 rounded-lg w-full mt-4">Cancelar</button>
        </form>
        <div class="mt-4">
            <label for="link" class="block text-sm text-gray-600">Enlace para compartir</label>
            <input type="text" id="link" class="px-4 py-2 w-full border rounded-lg" readonly>
            <button onclick="copiarLink()" class="bg-green-500 text-white px-4 py-2 rounded-lg mt-2 w-full">Copiar Enlace</button>
        </div>
    </div>
</div>
<div id="modalFechaExpiracion" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-semibold mb-4">Fecha de Expiración</h2>
        <form id="formFechaExpiracion" action="{{ route('archivo.agregarFechaExpiracion') }}" method="POST">
            @csrf
            <input type="hidden" id="archivoIdFecha" name="archivoId">
            <div class="mb-4">
                <label for="fecha_expiracion" class="block text-sm text-gray-600">Fecha de Expiración</label>
                <input type="date" id="fecha_expiracion" name="fecha_expiracion" class="px-4 py-2 w-full border rounded-lg">
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-[#5c15ea] text-white px-4 py-2 rounded-lg w-full">Guardar</button>
                <button type="button" onclick="quitarFechaExpiracion()" class="bg-red-500 text-white px-4 py-2 rounded-lg w-full ml-2">Quitar Fecha</button>
            </div>
            <button type="button" onclick="cerrarModalFechaExpiracion()" class="bg-gray-500 text-white px-4 py-2 rounded-lg w-full mt-4">Cancelar</button>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function toggleMenu(button) {
        let menu = button.nextElementSibling;
        document.querySelectorAll('.options-menu').forEach(m => {
            if (m !== menu) m.classList.add('hidden');
        });
        menu.classList.toggle('hidden');
    }
    function mostrarModalCompartir(idArchivo) {
        document.getElementById('archivoId').value = idArchivo;
        var enlace = window.location.origin + '/archivo/descargar/' + idArchivo;
        document.getElementById('link').value = enlace;
        document.getElementById('modalCompartir').classList.remove('hidden');
    }
    function mostrarModalFechaExpiracion(idArchivo) {
        document.getElementById('archivoIdFecha').value = idArchivo;
        document.getElementById('modalFechaExpiracion').classList.remove('hidden');
    }

    function cerrarModalFechaExpiracion() {
        document.getElementById('modalFechaExpiracion').classList.add('hidden');
    }
    function cerrarModal() {
        document.getElementById('modalCompartir').classList.add('hidden');
    }
    function quitarFechaExpiracion() {
        document.getElementById('fecha_expiracion').value = '';
        document.getElementById('formFechaExpiracion').submit();
    }
    function mostrarMensajeExpiracion(fechaExpiracion) {
        let fechaExp = new Date(fechaExpiracion);
        let fechaActual = new Date();
        fechaExp.setHours(0, 0, 0, 0);
        fechaActual.setHours(0, 0, 0, 0);
        let diferencia = fechaExp - fechaActual;
        let diasRestantes = Math.floor(diferencia / (1000 * 60 * 60 * 24));
        if (diasRestantes > 0) {
            alert(`Fecha de expiración: ${diasRestantes} días`);
        } else if (diasRestantes === 0) {
            alert("La fecha de expiración es hoy.");
        } else {
            alert("El archivo ya ha expirado.");
        }
    }
    function copiarLink() {
        var linkInput = document.getElementById('link');
        linkInput.select();
        document.execCommand('copy');
        alert('Enlace copiado al portapapeles!');
    }
    function eliminarArchivo(idArchivo) {
        if (!confirm('¿Estás seguro de que deseas eliminar este archivo?')) {
            return;
        }
        fetch(`/archivo/eliminar/${idArchivo}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                setTimeout(() => {
                    location.reload();
                }, 500);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    document.addEventListener('click', function(event) {
        if (!event.target.closest('.options-btn') && !event.target.closest('.options-menu')) {
            document.querySelectorAll('.options-menu').forEach(m => m.classList.add('hidden'));
        }
    });
</script>
@endpush
@endsection
