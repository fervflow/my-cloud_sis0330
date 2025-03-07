<?php

namespace App\Http\Controllers;

use App\Core\Services\UsuarioService;
use App\Core\Services\PlanService;
use App\Core\Services\ArchivoService;
use App\Core\Services\ArchivoUsuarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Core\Dtos\UsuarioDTO;
use App\Models\UsuarioModel;
use Carbon\Carbon;

class HomeController extends Controller
{
    private $usuarioService;
    private $archivoUsuarioService;
    private $planService;
    private $archivoService;

    public function __construct(UsuarioService $usuarioService, ArchivoUsuarioService $archivoUsuarioService, PlanService $planService, ArchivoService $archivoService)
    {
        $this->usuarioService = $usuarioService;
        $this->archivoUsuarioService = $archivoUsuarioService;
        $this->planService = $planService;
        $this->archivoService = $archivoService;
    }
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
        $archivosUsuario = $this->archivoUsuarioService->obtenerArchivosUsuario($usuarioModel->id);
        foreach ($archivosUsuario as $archivo) {
            if ($archivo->fecha_expiracion && Carbon::parse($archivo->fecha_expiracion)->isPast()) {
                $this->archivoService->eliminarArchivo($archivo->id);
            }
        }
        if ($busqueda) {
            $archivosUsuario = $this->archivoUsuarioService->buscarArchivosPorNombre($usuarioModel->id, $busqueda);
        }
        $archivosCompartidos = $this->archivoUsuarioService->obtenerArchivosCompartidos($usuarioModel->id);
        $archivosPropios = $archivosUsuario;
        $archivosConCompartidos = $archivosPropios->map(function ($archivoUsuario) {
            $compartidos = \App\Models\CompartirArchivoModel::where('id_archivo', $archivoUsuario->archivo->id_archivo)
                ->with('usuarioDestino')
                ->get();
            $correosCompartidos = $compartidos->map(function ($compartir) {
                return $compartir->usuarioDestino->correo;
            })->implode(', ');
            $archivoUsuario->correosCompartidos = $correosCompartidos;

            return $archivoUsuario;
        });
        $archivos = $archivosPropios->merge($archivosCompartidos);

        return view('Home.index', compact('usuario', 'archivos', 'busqueda', 'archivosPropios', 'archivosCompartidos', 'archivosConCompartidos'));
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
