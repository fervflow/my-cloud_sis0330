@extends('layouts.designerHome')

@section('content')

<main class="flex-1 p-6">
    <div class="flex justify-between items-center mb-6">
        <div class="flex border rounded-lg overflow-hidden w-1/3 shadow-md">
            <form method="GET" action="{{ route('home.index') }}" class="flex w-full">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar archivo"
                       class="px-4 py-3 w-full border-none outline-none text-gray-800 bg-gray-100 focus:ring-2 focus:ring-blue-500 rounded-l-lg">
                <button type="submit" class="bg-gray-300 px-4 py-3 text-gray-700 hover:bg-gray-400 rounded-r-lg transition duration-200">
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
                @forelse($archivosUsuario as $archivoUsuario)
                    <tr class="border-b hover:bg-gray-50 transition duration-200">
                        <td class="p-3 text-sm text-gray-800">{{ $archivoUsuario->archivo->nombre }}</td>
                        <td class="p-3 text-sm text-gray-600">{{ $archivoUsuario->archivo->updated_at->format('d M Y') }}</td>
                        <td class="p-3 text-sm text-gray-600">{{ number_format($archivoUsuario->archivo->tamanio / 1048576, 2) }} MB</td>
                        <td class="p-3 text-center relative">
                            <button onclick="toggleMenu(this)" class="options-btn text-gray-600 hover:text-gray-800">
                                ⋮
                            </button>
                            <div class="options-menu hidden absolute right-0 bg-white shadow-md rounded-lg p-2 w-48 mt-2">
                                <a href="{{ route('archivo.descargar', $archivoUsuario->archivo->id_archivo) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                                    <svg class="w-5 h-5 text-gray-700 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01"/>
                                    </svg>
                                    Descargar
                                </a>
                                <button class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center" onclick="compartirArchivo({{ $archivoUsuario->archivo->id_archivo }})">
                                    <svg class="w-5 h-5 text-gray-700 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                    </svg>
                                    Compartir
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
    </div>
</main>

@push('scripts')
<script>
    function toggleMenu(button) {
        let menu = button.nextElementSibling;
        document.querySelectorAll('.options-menu').forEach(m => {
            if (m !== menu) m.classList.add('hidden');
        });
        menu.classList.toggle('hidden');
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
            } else {
                alert('Error al eliminar el archivo: ' + (data.message || 'Intente nuevamente.'));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Hubo un error inesperado al eliminar el archivo');
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
