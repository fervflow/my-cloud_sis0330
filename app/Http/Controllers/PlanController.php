<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\Services\PlanService;
use App\Core\Dtos\PlanDTO;
use Illuminate\Support\Facades\Auth;


class PlanController extends Controller
{
    //
    protected $planService;

    public function index()
    {
        $usuario = Auth::user();  // Obtiene el usuario autenticado
        return view('Plan.createPlan', compact('usuario'))->with('usuario', $usuario);
    }

    public function __construct(PlanService $planService)
    {
        $this->planService = $planService;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'almacenamiento' => 'required|numeric',
            'periodo_meses' => 'required|integer',
            'esta_activo' => 'boolean',
        ]);
        $planDTO = new PlanDTO(
            id: '',
            nombre: $validatedData['nombre'],
            precio: $validatedData['precio'],
            alamacenamiento: $validatedData['almacenamiento'],
            esta_activo: $validatedData['esta_activo'] ?? true,
        );
        $plan = $this->planService->createPlan($planDTO);
        return redirect()->route('plan')->with('success', 'Plan creado con éxito');
    }

}
