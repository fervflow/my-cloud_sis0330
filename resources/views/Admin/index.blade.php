@extends('layouts.designerHome')

@section('content')
<main class="flex-1 p-6 bg-gray-50">
    <p class="text-left text-5xl font-bold text-gray-900 mb-8">
        BIENVENIDO ADMINISTRADOR
    </p>

    <div class="flex justify-between items-center mb-4">
        <form action="{{ route('admin') }}" method="GET" class="flex border rounded-lg overflow-hidden w-1/3 bg-white shadow-md">
            <input type="text" name="search" placeholder="Buscar Usuarios" class="px-4 py-2 w-full border-none outline-none focus:ring-2 focus:ring-purple-600" value="{{ request('search') }}">
            <button class="bg-gray-300 px-4 py-2 hover:bg-gray-400 transition-colors">
                <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.2-5.2m2.7-4.8a7 7 0 1 1-14 0 7 7 0 0 1 14 0z"></path>
                </svg>
            </button>
        </form>
    </div>

    <div class="text-center mb-6">
        <p class="text-3xl font-bold text-gray-900">
            LISTA DE USUARIOS
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
        @foreach ($usuarios as $user)
            <div class="w-full pt-2 max-w-sm mb-3 bg-white border border-gray-200 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                <div class="flex flex-col items-center pb-10">
                    <div class="bg-[#5c15ea] text-white w-20 h-20 flex items-center justify-center rounded-full text-4xl font-bold mt-2">
                        {{ strtoupper(substr($user->nombres, 0, 1)) }}
                        <br>
                        <h5 class="mb-1 text-xl font-medium text-gray-900 ">Bonnie</h5>
                    </div>
                    <div class="mt-auto text-sm">
                        <p class="text-gray-700">Almacenamiento 50%</p>
                        <div class="w-full bg-gray-300 rounded-full h-2 relative">
                            <div class="bg-green-500 h-2 rounded-full" style="width: 50%;"></div>
                        </div>
                        <p class="text-gray-600 mt-1">10 Gb utilizados de 20 Gb</p>
                    </div>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 mt-4">{{ $user->nombres }} {{ $user->apellidos }}</h5>
                    <p class="mt-2 text-gray-700 text-sm">{{ $user->correo }}</p>
                    <div class="mt-3 text-center">
                        <p class="text-sm">Rol: <span class="badge bg-{{ $user->rol == 'admin' ? 'danger' : 'primary' }}">{{ ucfirst($user->rol) }}</span></p>
                        <p class="text-gray-700 text-sm">Almacenamiento: {{ $user->espacio_disponible }} de {{ $user->espacio_total }} MB</p>
                        <div class="w-full bg-gray-300 rounded-full h-2 mt-2 relative">
                            <div class="bg-green-500 h-2 rounded-full transition-all" style="width: {{ ($user->espacio_total > 0) ? (($user->espacio_total - $user->espacio_disponible) / $user->espacio_total) * 100 : 0 }}%;"></div>
                        </div>
                    </div>

                    <div class="flex mt-4 md:mt-6 space-x-2">
                        <button class="btn btn-primary bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg shadow-md" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}">
                            Editar
                        </button>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel{{ $user->id }}">Editar Usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('usuarios.update', $user->id) }}" method="POST" id="editForm{{ $user->id }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="nombres{{ $user->id }}" class="form-label">Nombres</label>
                                    <input type="text" class="form-control" id="nombres{{ $user->id }}" name="nombres" value="{{ $user->nombres }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="apellidos{{ $user->id }}" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidos{{ $user->id }}" name="apellidos" value="{{ $user->apellidos }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="correo{{ $user->id }}" class="form-label">Correo</label>
                                    <input type="email" class="form-control" id="correo{{ $user->id }}" name="correo" value="{{ $user->correo }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="espacio_total{{ $user->id }}" class="form-label">Espacio Total (MB)</label>
                                    <input type="number" class="form-control" id="espacio_total{{ $user->id }}" name="espacio_total" value="{{ $user->espacio_total }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="rol{{ $user->id }}" class="form-label">Rol</label>
                                    <select class="form-select" id="rol{{ $user->id }}" name="rol">
                                        <option value="usuario" {{ $user->rol == 'usuario' ? 'selected' : '' }}>Usuario</option>
                                        <option value="admin" {{ $user->rol == 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg shadow-md">Guardar Cambios</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</main>
@endsection
