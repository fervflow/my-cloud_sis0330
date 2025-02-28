@extends('layouts.designerHome')

@section('content')

<div class="container mx-auto mt-6">
    <h1 class="text-2xl font-semibold text-gray-800 mb-4">Crear Plan</h1>

    <form action="{{ route('plan.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg">
        @csrf

        <!-- Nombre -->
        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Plan</label>
            <input type="text" id="nombre" name="nombre" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-600" required>
        </div>

        <!-- Precio -->
        <div class="mb-4">
            <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
            <input type="number" step="0.01" id="precio" name="precio" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-600" required>
        </div>

        <!-- Almacenamiento -->
        <div class="mb-4">
            <label for="almacenamiento" class="block text-sm font-medium text-gray-700">Almacenamiento (GB)</label>
            <input type="number" step="0.01" id="almacenamiento" name="almacenamiento" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-600" required>
        </div>

        <!-- Periodo en meses -->
        <div class="mb-4">
            <label for="periodo_meses" class="block text-sm font-medium text-gray-700">Periodo (Meses)</label>
            <input type="number" id="periodo_meses" name="periodo_meses" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-600" required>
        </div>

        <!-- Activo -->
        <div class="mb-4">
            <label for="esta_activo" class="block text-sm font-medium text-gray-700">¿Está activo?</label>
            <select id="esta_activo" name="esta_activo" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-600">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>

        <!-- Botón de Guardar -->
        <div class="mt-4">
            <button type="submit" class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500">Guardar Plan</button>
        </div>
    </form>
</div>
@endsection
