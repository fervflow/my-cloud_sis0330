<?php

namespace App\Http\Controllers;

use App\Core\DTOs\CarpetaDTO;
use App\Core\DTOs\UsuarioCarpetaDTO;
use App\Core\Services\CarpetaService;
use App\Core\Services\UsuarioCarpetaService;
use Illuminate\Http\Request;
use App\Models\CarpetaModel;

class CarpetaController extends Controller
{
    protected $carpetaService;
    protected $usuarioCarpetaService;

    public function __construct(CarpetaService $carpetaService, UsuarioCarpetaService $usuarioCarpetaService)
    {
        $this->carpetaService = $carpetaService;
        $this->usuarioCarpetaService = $usuarioCarpetaService;
    }

    /**
     * Crear una nueva carpeta.
     */
    public function crear(Request $request)
    {
        $request->validate([
            'nombreCarpeta' => 'required|string|max:255',
        ]);

        // Crear la carpeta
        $carpeta = CarpetaModel::create([
            'nombre' => $request->input('nombreCarpeta'),
        ]);

        return redirect()->back()->with('success', 'Carpeta creada exitosamente.');
    }

    /**
     * Asociar un usuario a una carpeta.
     */
    public function asociarUsuario(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|integer',
            'id_carpeta' => 'required|integer',
        ]);

        $usuarioCarpetaDTO = new UsuarioCarpetaDTO(
            $request->input('id_usuario'),
            $request->input('id_carpeta')
        );

        $this->usuarioCarpetaService->asociarUsuarioCarpeta($usuarioCarpetaDTO);

        return redirect()->back()->with('success', 'Usuario asociado a la carpeta exitosamente.');
    }

    /**
     * Obtener las carpetas de un usuario.
     */
    public function obtenerCarpetasPorUsuario($id_usuario)
    {
        $carpetas = $this->usuarioCarpetaService->obtenerCarpetasPorUsuario($id_usuario);
        return response()->json($carpetas);
    }
    
    // Otros métodos como editar, eliminar, etc.
}
