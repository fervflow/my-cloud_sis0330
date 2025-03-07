<?php

namespace App\Http\Controllers;

use App\Core\Services\ArchivoService;
use App\Core\Services\UsuarioService;
use App\Core\Services\ArchivoUsuarioService;
use Illuminate\Support\Facades\Auth;
use App\Core\Dtos\ArchivoDTO;
use App\Core\Dtos\ArchivoUsuarioDTO;
use App\Core\Dtos\CompartirArchivoDTO;
use App\Core\Services\CompartirArchivoService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Wavey\Sweetalert\Sweetalert;


class ArchivoController extends Controller
{
    protected $archivoService;
    protected $usuarioService;
    protected $archivoUsuarioService;
    protected $compartirArchivoService;

    public function __construct(ArchivoService $archivoService, UsuarioService $usuarioService, ArchivoUsuarioService $archivoUsuarioService, CompartirArchivoService $compartirArchivoService)
    {
        $this->usuarioService = $usuarioService;
        $this->archivoService = $archivoService;
        $this->archivoUsuarioService = $archivoUsuarioService;
        $this->compartirArchivoService = $compartirArchivoService;
    }
    public function subirArchivo(Request $request)
    {
        $usuario = Auth::user();
        if (!$usuario) {
            Sweetalert::error('Por favor, inicie sesión para subir archivos.')->persistent('Cerrar');
            return redirect()->route('login');
        }
        if (!isset($usuario->espacio_disponible)) {
            dd('El usuario no tiene la propiedad espacio_disponible.');
        }

        $request->validate([
            'archivo' => 'required|file',
            'fecha_expiracion' => 'nullable|date'
        ]);

        $archivo = $request->file('archivo');
        $nombreOriginal = $archivo->getClientOriginalName();
        $nombreArchivo = pathinfo($nombreOriginal, PATHINFO_FILENAME) . '.zip';
        $rutaZip = storage_path('app/public/archivos/' . $nombreArchivo);

        $zip = new \ZipArchive();
        if ($zip->open($rutaZip, \ZipArchive::CREATE) === TRUE) {
            $zip->addFile($archivo->getRealPath(), $nombreOriginal);
            $zip->close();
        } else {
            Sweetalert::error('Error al comprimir el archivo.')->persistent('Cerrar');
            return redirect()->back();
        }

        $tamanoArchivoMb = filesize($rutaZip) / 1024 / 1024;
        $espacioDisponibleActual = $usuario->espacio_disponible;
        if (is_null($espacioDisponibleActual)) {
            dd('El campo espacio_disponible es nulo o no está disponible para el usuario.');
        }
        if ($tamanoArchivoMb > $espacioDisponibleActual) {
            unlink($rutaZip);
            Sweetalert::error('No tienes suficiente espacio disponible.')->persistent('Cerrar');
            return redirect()->back();
        }

        $nuevoEspacioDisponible = $espacioDisponibleActual - $tamanoArchivoMb;
        $rutaEnDB = 'archivos/' . $nombreArchivo;
        $fechaExpiracion = $request->input('fecha_expiracion') ? Carbon::parse($request->input('fecha_expiracion')) : null;

        $archivoDTO = new ArchivoDTO(
            $nombreArchivo,
            $rutaEnDB,
            filesize($rutaZip),
            'application/zip',
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
            $this->usuarioService->updateUser($usuario->id, ['espacio_disponible' => $nuevoEspacioDisponible]);
            Sweetalert::success('Archivo subido y comprimido con éxito.')->persistent('Cerrar');
        }

        return redirect()->back();
    }

    public function agregarFechaExpiracion(Request $request)
    {
        $request->validate([
            'archivoId' => 'required|exists:archivos,id_archivo',
            'fecha_expiracion' => 'nullable|date|after_or_equal:today',
        ]);

        $archivoId = $request->input('archivoId');
        $fechaExpiracion = $request->input('fecha_expiracion');
        $archivo = $this->archivoService->getArchivoById($archivoId);

        if (!$archivo) {
            Sweetalert::error('Archivo no encontrado.')->persistent('Cerrar');
            return back();
        }

        if ($fechaExpiracion) {
            $archivo->fecha_expiracion = Carbon::parse($fechaExpiracion);
        } else {
            $archivo->fecha_expiracion = null;
        }

        $archivo->save();
        Sweetalert::success('Fecha de expiración actualizada correctamente.')->persistent('Cerrar');
        return back();
    }


    public function eliminarArchivo($id)
    {
        $archivo = $this->archivoService->getArchivoById($id);
        if (!$archivo) {
            return response()->json(['success' => false, 'message' => 'Archivo no encontrado.']);
        }

        $usuario = Auth::user();
        if (!$usuario) {
            return response()->json(['success' => false, 'message' => 'Usuario no autenticado.']);
        }

        $tamanoArchivoMb = $archivo->tamanio / 1024 / 1024;
        $nuevoEspacioDisponible = $usuario->espacio_disponible + $tamanoArchivoMb;

        try {
            $this->usuarioService->updateUser($usuario->id, ['espacio_disponible' => $nuevoEspacioDisponible]);
            $this->archivoUsuarioService->eliminarArchivoUsuario($usuario->id, $id);
            Storage::disk('public')->delete($archivo->ruta);
            $this->archivoService->eliminarArchivo($id);

            Sweetalert::success('Archivo eliminado con éxito.')->persistent('Cerrar');
            return response()->json([
                'success' => true,
                'message' => 'Archivo eliminado con éxito.',
                'espacio_disponible' => $nuevoEspacioDisponible
            ]);
        } catch (\Exception $e) {
            Sweetalert::error('Error eliminando el archivo: ' . $e->getMessage())->persistent('Cerrar');
            return response()->json(['success' => false, 'message' => 'Error eliminando el archivo: ' . $e->getMessage()]);
        }
    }
    public function descargarArchivo($id)
    {
        $archivo = $this->archivoService->getArchivoById($id);
        if (!$archivo) {
            return redirect()->back()->with('error', 'Archivo no encontrado.');

        }
        $rutaArchivo = storage_path("app/public/{$archivo->ruta}");
        if (!file_exists($rutaArchivo)) {
            return redirect()->back()->with('error', 'El archivo no existe en el servidor.');

        }
        return response()->download($rutaArchivo, $archivo->nombre);
    }

    public function compartirArchivo(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'archivoId' => 'required|exists:archivos,id_archivo',
        ]);

        $usuario = Auth::user();
        $archivoId = $request->input('archivoId');
        $correo = $request->input('correo');
        $archivo = $this->archivoService->getArchivoById($archivoId);

        if (!$archivo) {
            SweetAlert::error('Archivo no encontrado.')->persistent('Cerrar');
            return back();
        }

        $usuarioDestino = $this->usuarioService->findUserByEmail($correo);

        if (!$usuarioDestino) {
            SweetAlert::error('El correo proporcionado no está registrado.')->persistent('Cerrar');
            return back();
        }

        $compartirArchivoDTO = new CompartirArchivoDTO($usuario->id, $usuarioDestino->id, $archivo->id_archivo);
        $this->compartirArchivoService->compartirArchivo($compartirArchivoDTO);

        SweetAlert::success('El archivo ha sido compartido con éxito.')->persistent('Cerrar');
        return back();
    }

    public function descargarArchivo($id)
    {
        $archivo = $this->archivoService->getArchivoById($id);
        if (!$archivo) {
            return redirect()->back()->with('error', 'Archivo no encontrado.');
        }
        $rutaZip = storage_path("app/public/{$archivo->ruta}");
        if (!file_exists($rutaZip)) {
            return redirect()->back()->with('error', 'El archivo comprimido no existe en el servidor.');
        }
        $rutaDescomprimir = storage_path('app/public/descomprimidos/' . time());
        $zip = new \ZipArchive();
        if ($zip->open($rutaZip) === TRUE) {
            $zip->extractTo($rutaDescomprimir);
            $zip->close();
        } else {
            return redirect()->back()->with('error', 'Error al descomprimir el archivo.');
        }
        $archivos = scandir($rutaDescomprimir);
        foreach ($archivos as $archivoDescomprimido) {
            if ($archivoDescomprimido !== '.' && $archivoDescomprimido !== '..') {
                $rutaFinal = $rutaDescomprimir . '/' . $archivoDescomprimido;
                return response()->download($rutaFinal, $archivoDescomprimido)->deleteFileAfterSend(true);
            }
        }
        return redirect()->back()->with('error', 'No se encontró el archivo descomprimido.');
    }

    public function verArchivo($id)
    {
        $archivo = $this->archivoService->getArchivoById($id);
        if (!$archivo) {
            return redirect()->back()->with('error', 'Archivo no encontrado.');
        }
        return response()->file(storage_path("app/public/{$archivo->ruta}"));
    }
}
