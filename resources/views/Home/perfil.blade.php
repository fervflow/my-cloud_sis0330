@extends('layouts.designerHome')

@section('content')
<main class="flex-1 p-6">
    <h1 class="text-2xl font-bold text-gray-500 mb-4">Editar Perfil</h1>
    <form action="{{ route('home.updatePerfil') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nombres" class="block text-sm font-semibold text-gray-600">Nombres</label>
            <input type="text" id="nombres" name="nombres" value="{{ $usuario->nombres }}" class="w-full p-2 border rounded-md mt-1" required>
        </div>

        <div class="mb-4">
            <label for="apellidos" class="block text-sm font-semibold text-gray-600">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" value="{{ $usuario->apellidos }}" class="w-full p-2 border rounded-md mt-1" required>
        </div>

        <div class="mb-4">
            <label for="correo" class="block text-sm font-semibold text-gray-600">Correo</label>
            <input type="email" id="correo" name="correo" value="{{ $usuario->correo }}" class="w-full p-2 border rounded-md mt-1" required>
        </div>

        <!-- Checkbox para actualizar contraseña -->
        <div class="mb-4">
            <label for="updatePassword" class="inline-flex items-center text-sm font-semibold text-gray-600">
                <input type="checkbox" id="updatePassword" class="mr-2" />
                <span>¿Quieres actualizar tu contraseña?</span>
            </label>
        </div>

        <!-- Campo de contraseña (oculto por defecto) -->
        <div id="passwordFields" class="mb-4 hidden">
            <label for="password" class="block text-sm font-semibold text-gray-600">Nueva Contraseña</label>
            <input type="password" id="password" name="password" class="w-full p-2 border rounded-md mt-1">

            <label for="password_confirmation" class="block text-sm font-semibold text-gray-600 mt-2">Confirmar Contraseña</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="w-full p-2 border rounded-md mt-1">
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-purple-600 text-white py-2 px-6 rounded-md hover:bg-purple-700">Actualizar Perfil</button>
        </div>
    </form>
</main>

<script>
    // Mostrar/ocultar los campos de contraseña según el estado del checkbox
    document.getElementById('updatePassword').addEventListener('change', function() {
        const passwordFields = document.getElementById('passwordFields');
        if (this.checked) {
            passwordFields.classList.remove('hidden');
        } else {
            passwordFields.classList.add('hidden');
        }
    });
</script>

@endsection
