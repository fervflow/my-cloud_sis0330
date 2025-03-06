<?php

namespace App\Http\Controllers;

use App\Core\Services\UsuarioService;
use App\Core\Services\PlanService;
use App\Core\Services\ArchivoUsuarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Core\Dtos\UsuarioDTO;
use App\Models\UsuarioModel;

class HomeController extends Controller
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

    /*public function index(Request $request)
    {
        $usuarioModel = Auth::user();
        if (!$usuarioModel instanceof UsuarioModel) {
            abort(403, 'Usuario no autorizado');
        }

        $usuario = UsuarioDTO::fromModel($usuarioModel);
        $usuario->espacio_utilizado = 0;
        $usuario->espacio_total = $usuario->espacio_total ?: 5;

        $busqueda = $request->input('search');

        // Filtrar archivos si hay un término de búsqueda
        if ($busqueda) {
            $archivosUsuario = $this->archivoUsuarioService->buscarArchivosPorNombre($usuarioModel->id, $busqueda);
        } else {
            $archivosUsuario = $this->archivoUsuarioService->obtenerArchivosUsuario($usuarioModel->id);
        }

        return view('Home.index', compact('usuario', 'archivosUsuario', 'busqueda'));
    }*/

    public function index(Request $request)
{
    $usuarioModel = Auth::user();
    if (!$usuarioModel instanceof UsuarioModel) {
        abort(403, 'Usuario no autorizado');
    }
    $usuario = UsuarioDTO::fromModel($usuarioModel);
    $usuario->espacio_utilizado = 0;
    $usuario->espacio_total = $usuario->espacio_total ?: 5;
    $busqueda = $request->input('search');

    $archivosUsuario = [];
    if ($busqueda) {
        $archivosUsuario = $this->archivoUsuarioService->buscarArchivosPorNombre($usuarioModel->id, $busqueda);
    } else {
        $archivosUsuario = $this->archivoUsuarioService->obtenerArchivosUsuario($usuarioModel->id);
    }
    $archivosCompartidos = $this->archivoUsuarioService->obtenerArchivosCompartidos($usuarioModel->id);
    $archivosPropios = $archivosUsuario;
    $archivos = $archivosPropios->merge($archivosCompartidos);

    return view('Home.index', compact('usuario', 'archivos', 'busqueda', 'archivosPropios', 'archivosCompartidos'));
}





    public function storage()
    {
        $usuario = Auth::user();
        return view('Home.almacenamiento', compact('usuario'));
    }
    public function inicio()
    {
        $planes = $this->planService->getPlans();
        return view('Home.dashboard', compact('planes'));
    }

}
