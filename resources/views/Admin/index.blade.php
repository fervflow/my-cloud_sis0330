@extends('layouts.designerHome')

@section('content')
<main class="flex-1 p-6">
    <p class="text-left text-5xl font-bold text-gray-900 ">
        BIENVENIDO ADMINISTRADOR
    </p>
    <br>
    <!-- Buscador Usuarios -->
    <div class="flex justify-between items-center mb-4">
        <form action="{{ route('admin') }}" method="GET" class="flex border rounded-lg overflow-hidden w-1/3">
            <input type="text" name="search" placeholder="Buscar Usuarios" class="px-4 py-2 w-full border-none outline-none" value="{{ request('search') }}">
            <button class="bg-gray-300 px-4 py-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.2-5.2m2.7-4.8a7 7 0 1 1-14 0 7 7 0 0 1 14 0z"></path>
                </svg>
            </button>
        </form>
    </div>
    <br>

    <head>
        <div>
            <p class="text-center text-3xl font-bold text-gray-900">
                LISTA DE USUARIOS
            </p>
            <br>

            <!-- Grid de 5 columnas -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach ($usuarios as $user)
                    <div class="w-full pt-2 max-w-sm mb-3 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-800">
                        <div class="flex flex-col items-center pb-10">
                            <div class="bg-purple-600 text-white w-20 h-20 flex items-center justify-center rounded-full text-4xl font-bold mt-2">
                                {{ strtoupper(substr($user->nombres, 0, 1)) }}
                            </div>
                            <br>
                            <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $user->nombres }} {{ $user->apellidos }}</h5>
                            <div class="mt-auto text-sm">
                                <!-- Aquí se centra el texto del rol -->
                                <p class="text-center">Rol: <span class="badge bg-{{ $user->rol == 'admin' ? 'danger' : 'primary' }}">{{ ucfirst($user->rol) }}</span></p>
                                <p class="text-gray-700">Almacenamiento 50%</p>
                                <div class="w-full bg-gray-300 rounded-full h-2 relative">
                                    <div class="bg-green-500 h-2 rounded-full" style="width: 50%;"></div>
                                </div>
                                <p class="text-gray-600 mt-1">Espacio: {{ $user->espacio_total }} GB</p>
                            </div>
                            <div class="flex mt-4 md:mt-6">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}">
                                    Editar
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $user->id }}">Editar user</h5>
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
                                            <label for="espacio_total{{ $user->id }}" class="form-label">Espacio Total (GB)</label>
                                            <input type="number" class="form-control" id="espacio_total{{ $user->id }}" name="espacio_total" value="{{ $user->espacio_total }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="rol{{ $user->id }}" class="form-label">Rol</label>
                                            <select class="form-select" id="rol{{ $user->id }}" name="rol">
                                                <option value="usuario" {{ $user->rol == 'usuario' ? 'selected' : '' }}>Usuario</option>
                                                <option value="admin" {{ $user->rol == 'admin' ? 'selected' : '' }}>Admin</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success">Guardar cambios</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>

        <!-- Lista premium -->
        <div>
            <p class="text-center text-3xl font-bold text-gray-900 ">
                LISTA DE USUARIOS PREMIUM
            </p>
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-800">
                <div class="flex flex-col items-center pb-10">
                    <br>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 ">Bonnie Green</h5>
                    <div class="mt-auto text-sm">
                        <p class="text-gray-700">Almacenamiento 50%</p>
                        <div class="w-full bg-gray-300 rounded-full h-2 relative">
                            <div class="bg-green-500 h-2 rounded-full" style="width: 50%;"></div>
                        </div>
                        <p class="text-gray-600 mt-1">10 Gb utilizados de 20 Gb</p>
                    </div>
                    <div class="flex mt-4 md:mt-6">
                        <a href="adminuser" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Inspeccionar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </head>

</main>
@endsection
