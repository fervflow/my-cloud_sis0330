<?php

namespace App\Http\Controllers;

use App\Core\Services\UsuarioService;
use App\Core\Services\PlanService;
use App\Core\Services\ArchivoUsuarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Core\Dtos\UsuarioDTO;
use App\Models\UsuarioModel;
use Wavey\Sweetalert\Sweetalert;

class StorageController extends Controller
{
    private $usuarioService;
    private $archivoUsuarioService;
    private $planService;

    public function __construct(UsuarioService $usuarioService, ArchivoUsuarioService $archivoUsuarioService, PlanService $planService)
    {
        $this->usuarioService = $usuarioService;
        $this->archivoUsuarioService = $archivoUsuarioService;
        $this->planService = $planService;
    }

    public function recient()
    {
        $usuarioModel = Auth::user();
        if (!$usuarioModel instanceof UsuarioModel) {
            Sweetalert::error('Acceso Denegado', 'Usuario no autorizado.');
            abort(403, 'Usuario no autorizado');
        }

        $usuario = UsuarioDTO::fromModel($usuarioModel);
        $usuario->espacio_utilizado = 0;
        $usuario->espacio_total = $usuario->espacio_total ?: 5;
        $archivosUsuario = $this->archivoUsuarioService->obtenerArchivosRecienteUsuario($usuarioModel->id);

        Sweetalert::info('Información', 'Mostrando archivos recientes.'); // Información adicional
        return view('Home.Reciente', compact('usuario', 'archivosUsuario'));
    }

    public function storage()
    {
        $usuarioModel = Auth::user();
        if (!$usuarioModel instanceof UsuarioModel) {
            Sweetalert::error('Acceso Denegado', 'Usuario no autorizado.');
            abort(403, 'Usuario no autorizado');
        }

        $usuario = UsuarioDTO::fromModel($usuarioModel);
        $usuario->espacio_utilizado = 0;
        $usuario->espacio_total = $usuario->espacio_total ?: 5;
        $archivosUsuario = $this->archivoUsuarioService->obtenerArchivosTamanioUsuario($usuarioModel->id);

        if (empty($archivosUsuario)) {
            Sweetalert::warning('Sin Archivos', 'No tienes archivos almacenados.');
        }

        Sweetalert::info('Información', 'Mostrando archivos por tamaño.'); // Información adicional
        return view('Home.almacenamiento', compact('usuario', 'archivosUsuario'));
    }
}
