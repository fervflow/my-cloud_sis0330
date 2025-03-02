<?php

namespace App\Http\Controllers;
use App\Core\Services\ArchivoService;
use App\Core\Services\UsuarioService;
use App\Core\Services\ArchivoUsuarioService;
use Illuminate\Support\Facades\Auth;
use App\Core\Dtos\ArchivoDTO;
use App\Core\Dtos\ArchivoUsuarioDTO;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ArchivoController extends Controller
{
    //
    protected $archivoService;
    protected $usuarioService;
    protected $archivoUsuarioService;

    public function __construct(ArchivoService $archivoService, UsuarioService $usuarioService, ArchivoUsuarioService $archivoUsuarioService) // Inyecta el servicio
    {
        $this->usuarioService = $usuarioService;
        $this->archivoService = $archivoService;
        $this->archivoUsuarioService = $archivoUsuarioService;
    }

    public function subirArchivo(Request $request)
    {
        $usuario = Auth::user();
        $request->validate([
            'archivo' => 'required|file|max:5120',
            'fecha_expiracion' => 'nullable|date'
        ]);
        $archivo = $request->file('archivo');
        $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
        $ruta = $archivo->storeAs('archivos', $nombreArchivo, 'public');
        $fechaExpiracion = $request->input('fecha_expiracion') ? Carbon::parse($request->input('fecha_expiracion')) : null;
        $archivoDTO = new ArchivoDTO(
            $nombreArchivo,
            $ruta,
            $archivo->getSize(),
            $archivo->getClientMimeType(),
            $fechaExpiracion
        );
        $archivoCreado = $this->archivoService->add($archivoDTO);
        if ($archivoCreado) {
            $archivoUsuarioDTO = new ArchivoUsuarioDTO(
                $usuario->id,
                $archivoCreado->id_archivo,
                null
            );
            $this->archivoUsuarioService->crearArchivoUsuario($archivoUsuarioDTO);
        }
        return redirect()->back()->with('success', 'Archivo subido con éxito');
    }


}
