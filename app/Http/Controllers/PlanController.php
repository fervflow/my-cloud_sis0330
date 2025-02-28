<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\Services\PlanService;
use App\Core\Dtos\PlanDTO;
use Illuminate\Support\Facades\Auth;
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
}
