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
                        <td class="p-2 relative">
                            <button onclick="toggleMenu(this)" class="options-btn">⋮</button>
                            <div class="options-menu hidden absolute right-0 bg-white shadow-md rounded p-2">
                                <a href="{{ route('archivo.descargar', $archivoUsuario->archivo->id_archivo) }}" class="block px-4 py-2 text-sm hover:bg-gray-200">
                                    <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01"/>
                                    </svg>
                                </a>
                                <button class="block px-4 py-2 text-sm hover:bg-gray-200" onclick="compartirArchivo({{ $archivoUsuario->archivo->id_archivo }})">
                                    <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                    </svg>
                                </button>
                                <button class="block px-4 py-2 text-sm hover:bg-red-200 text-red-600"
                                        onclick="eliminarArchivo({{ $archivoUsuario->archivo->id_archivo }})">
                                    <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
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
                alert('Archivo eliminado con éxito');
                location.reload();
            } else {
                alert('Error al eliminar el archivo');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Hubo un error al eliminar el archivo');
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
