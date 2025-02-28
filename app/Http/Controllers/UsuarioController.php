<?php

namespace App\Http\Controllers;

// use App\Services\UsuarioService;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Core\Services\UsuarioService;
use Illuminate\Http\JsonResponse;

class UsuarioController extends Controller
{
    protected $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->usuarioService->getUsuarios());
    }

    public function store(Request $request): JsonResponse
    {
        // Se podría validar el request aquí si es necesario
        // Se crea un nuevo usuario a partir de los datos del request.
        // Por ejemplo, podrías crear el DTO así:
        // $usuarioDTO = new UsuarioDTO(
        //    $request->nombres,
        //    $request->apellidos,
        //    $request->correo,
        //    '', // id vacío al crear
        //    $request->password, // o lo que necesites para la contraseña
        //    $request->rol,
        //    $request->espacio_disponible
        // );
        //
        // Luego:
        // $usuario = $this->usuarioService->createUser($usuarioDTO);
        //
        // En este ejemplo simplificado usaremos el método agregar similar al anterior,
        // pero adaptado según tus necesidades.

        // Ejemplo:
        $usuario = $this->usuarioService->createUser(
            new \App\Core\Dtos\UsuarioDTO(
                $request->nombres,
                $request->apellidos,
                $request->correo,
                '', // id vacío
                $request->password ?? '',
                $request->rol,
                $request->espacio_disponible
            )
        );
        return response()->json($usuario, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombres'             => 'required|string',
            'apellidos'           => 'required|string',
            'correo'              => 'required|email',
            'espacio_total'       => 'required|numeric',
            'rol'                 => 'required|string'
        ]);
        $usuarioActualizado = $this->usuarioService->updateUser((int)$id, $data);

        if ($usuarioActualizado) {
            return redirect()->back()->with('success', 'Usuario actualizado correctamente.');
        } else {
            return redirect()->back()->with('error', 'Error al actualizar el usuario.');
        }
    }
}

