@extends('layouts.designerHome')

@section('content')

<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="w-full max-w-4xl p-5">
        <h2 class="text-center text-2xl font-bold mb-2">Actualiza para aumentar el almacenamiento</h2>
        <p class="text-center text-gray-600 mb-6">Más espacio, beneficios adicionales</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($planes as $plan)
                <div class="bg-white p-5 rounded-lg shadow-md text-center
                    @if($plan->almacenamiento == 512) bg-green-100 border-2 border-green-500 @endif
                    @if($plan->almacenamiento == 1024) bg-blue-100 border-2 border-blue-500 @endif
                    @if($plan->almacenamiento == 2048) bg-purple-100 border-2 border-purple-500 @endif">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $plan->nombre }}</h3>
                    <h4 class="text-lg font-semibold text-gray-600">{{ number_format($plan->almacenamiento / 1024, 2) }} GB</h4>
                    <p class="text-xl font-bold text-gray-800">
                        Bs {{ number_format($plan->precio, 2) }}
                    </p>
                    <ul class="mt-4 text-sm text-gray-600 space-y-2">
                        <li>✔ {{ number_format($plan->almacenamiento / 1024, 2) }} GB de almacenamiento</li>
                        <li>✔ Expertos de Google</li>
                        <li>✔ Beneficios adicionales para miembros</li>
                    </ul>
                    <button
                        class="mt-4 w-full py-2 rounded-lg
                        @if($plan->almacenamiento == 512) bg-green-500 hover:bg-green-600 text-white @endif
                        @if($plan->almacenamiento == 1024) bg-blue-500 hover:bg-blue-600 text-white @endif
                        @if($plan->almacenamiento == 2048) bg-purple-500 hover:bg-purple-600 text-white @endif"
                        onclick="openModal({{ $plan->id }})">
                        Adquirir Plan
                    </button>
                </div>
            @endforeach
        </div>
    </div>
</body>

<div id="confirmModal" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-8 rounded-lg text-center shadow-md w-1/3">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Confirmar Adquisición</h3>
        <img src="{{ asset(path: 'Img/Qr.png') }}" class="h-40 mx-auto" alt="Mi Qr">
        <br>
        <p class="text-gray-600 mb-4">Escanear el Qr para el pago</p>
        <p class="text-gray-600 mb-4">¿Estás seguro de que deseas adquirir este plan?</p>
        <div class="flex justify-between">
            <button onclick="closeModal()" class="py-2 px-4 bg-gray-500 text-white rounded">Cancelar</button>
            <button id="confirmBtn" class="py-2 px-4 bg-blue-500 text-white rounded">Confirmar</button>
        </div>
    </div>
</div>

<script>
    let selectedPlanId = null;
    function openModal(planId) {
        selectedPlanId = planId;
        document.getElementById("confirmModal").classList.remove("hidden");
    }
    function closeModal() {
        document.getElementById("confirmModal").classList.add("hidden");
    }
    document.getElementById("confirmBtn").addEventListener("click", function() {
        if (selectedPlanId) {
            window.location.href = `/plan/adquirir/${selectedPlanId}`;
        }
    });
</script>

@endsection
