<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\Services\PlanService;
use App\Core\Services\PlanUsuarioService;
use App\Core\Dtos\PlanDTO;
use App\Core\Dtos\PlanUsuarioDTO;
use Illuminate\Support\Facades\Auth;
use App\Models\PlanUsuarioModel;
use App\Models\PlanModel;
use Illuminate\Support\Facades\Log;


class PlanController extends Controller
{
    //
    protected $planService;

    public function __construct(PlanService $planService)
    {
        $this->planService = $planService;
    }
    public function index()
    {
        $usuario = Auth::user();
        $planes = $this->planService->getPlans();

        return view('Plan.index', compact('usuario', 'planes'));
    }
    // Mostrar formulario para crear un nuevo plan
    public function create()
    {
        $usuario = Auth::user();
        return view('Plan.create', compact('usuario'));
    }

    // Guardar un nuevo plan
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'almacenamiento' => 'required|numeric',
            'periodo_meses' => 'required|integer',
            'esta_activo' => 'required|boolean',
        ]);

        // Crear el DTO y guardar el plan
        $planDTO = new PlanDTO(
            id: '',
            nombre: $request->input('nombre'),
            precio: $request->input('precio'),
            almacenamiento: $request->input('almacenamiento'),
            periodo_meses: $request->input('periodo_meses'),
            esta_activo: $request->input('esta_activo')
        );

        $planModel = $planDTO->toModel();

        // Guardar en la base de datos
        $planModel->save();

        // Redirigir o mostrar un mensaje de éxito
        return redirect()->route('plan.index')->with('success', 'Plan creado exitosamente.');
    }

    public function adquirir($planId)
    {
        // Obtener el usuario logueado
        $usuario = Auth::user();

        // Verificar si el usuario ya tiene un plan
        $planUsuario = PlanUsuarioModel::where('id_usuario', $usuario->id)->first();

        if ($planUsuario) {
            // El usuario ya tiene un plan, puedes redirigir con un mensaje de error o actualizar el plan
            return redirect()->route('plan.index')->with('error', 'Ya tienes un plan adquirido.');
        }

        // Obtener el plan seleccionado
        $plan = PlanModel::findOrFail($planId);

        // Registrar la relación entre el usuario y el plan en la tabla 'plan_usuario'
        $fechaPago = now()->toDateString(); // Fecha actual como fecha de pago
        $fechaRenovacion = now()->addMonths($plan->periodo_meses)->toDateString(); // Fecha de renovación

        $planUsuarioDTO = new PlanUsuarioDTO(
            id: '',
            id_usuario: $usuario->id,
            id_plan: $plan->id,
            fecha_pago: $fechaPago,
            fecha_renovacion: $fechaRenovacion,
            esta_pagado: false // Puede ser cambiado después, si es necesario
        );

        $this->PlanUsuarioService->asignarOActualizarPlan($planUsuarioDTO);

        return redirect()->route('plan.index')->with('success', 'Plan adquirido exitosamente.');
    }

}
