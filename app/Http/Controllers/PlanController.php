<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\Services\PlanService;
use App\Core\Services\UsuarioService;
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
    protected $planUsuarioService;
    protected $usuarioService;
    public function __construct(PlanService $planService, PlanUsuarioService $planUsuarioService, UsuarioService $usuarioService)
    {
        $this->planService = $planService;
        $this->planUsuarioService = $planUsuarioService;
        $this->usuarioService = $usuarioService;
    }
    public function index()
    {
        $usuario = Auth::user();
        $planes = $this->planService->getPlans();

        return view('Plan.index', compact('usuario', 'planes'));
    }
    public function create()
    {
        $usuario = Auth::user();
        return view('Plan.create', compact('usuario'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'almacenamiento' => 'required|numeric',
            'periodo_meses' => 'required|integer',
            'esta_activo' => 'required|boolean',
        ]);
        $planDTO = new PlanDTO(
            id: '',
            nombre: $request->input('nombre'),
            precio: $request->input('precio'),
            almacenamiento: $request->input('almacenamiento'),
            periodo_meses: $request->input('periodo_meses'),
            esta_activo: $request->input('esta_activo')
        );

        $planModel = $planDTO->toModel();
        $planModel->save();
        return redirect()->route('plan.index')->with('success', 'Plan creado exitosamente.');
    }

    public function adquirir($planId)
    {
        $usuario = Auth::user();
        $planUsuario = PlanUsuarioModel::where('id_usuario', $usuario->id)->first();
        if ($planUsuario) {
            return redirect()->route('plan.index')->with('error', 'Ya tienes un plan adquirido.');
        }
        $plan = PlanModel::findOrFail($planId);
        $fechaPago = now()->toDateString();
        $fechaRenovacion = now()->addMonths($plan->periodo_meses)->toDateString();
        $espacioTotalActual = $usuario->espacio_total;
        $espacioDisponibleActual = $usuario->espacio_disponible;
        $nuevoEspacioTotal = $plan->almacenamiento;
        $diferenciaEspacio = $nuevoEspacioTotal - $espacioTotalActual;
        $nuevoEspacioDisponible = $espacioDisponibleActual + $diferenciaEspacio;
        $nuevoEspacioDisponible = min($nuevoEspacioDisponible, $nuevoEspacioTotal);
        $planUsuarioDTO = new PlanUsuarioDTO(
            id: '',
            id_usuario: $usuario->id,
            id_plan: $plan->id,
            fecha_pago: $fechaPago,
            fecha_renovacion: $fechaRenovacion,
            esta_pagado: false
        );
        $this->planUsuarioService->asignarOActualizarPlan($planUsuarioDTO);
        $this->usuarioService->updateEspacioTotal($usuario->id, $nuevoEspacioTotal);
        $this->usuarioService->updateEspacioDisponible($usuario->id, $nuevoEspacioDisponible);

        return redirect()->route('plan.index')->with('success', 'Plan adquirido exitosamente.');
    }
}
