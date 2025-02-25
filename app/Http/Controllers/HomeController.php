<?php

namespace App\Http\Controllers;

use App\Core\Services\UsuarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Core\Dtos\UsuarioDTO;
use App\Models\UsuarioModel;

class HomeController extends Controller
{
    public function __construct(
        private UsuarioService $usuarioService,
    )
    { }
    public function index()
    {
        $usuarioModel = Auth::user();
        if (!$usuarioModel instanceof UsuarioModel) {
            abort(403, 'Usuario no autorizado');
        }
        $usuario = UsuarioDTO::fromModel($usuarioModel);
        $usuario->espacio_utilizado = 0;
        $usuario->espacio_total = $usuario->espacio_total ?: 5;

        return view('Home.index', compact('usuario'));
    }

    public function perfil()
    {
        $usuarioModel = Auth::user();
        if (!$usuarioModel instanceof UsuarioModel) {
            abort(403, 'Usuario no autorizado');
        }
        $usuario = UsuarioDTO::fromModel($usuarioModel);

        return view('Home.perfil', compact('usuario'));
    }

    public function updatePerfil(Request $request)
    {
        $usuarioModel = Auth::user();
        if (!$usuarioModel instanceof UsuarioModel) {
            abort(403, 'Usuario no autorizado');
        }

        $validated = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $data = [
            'nombres' => $validated['nombres'],
            'apellidos' => $validated['apellidos'],
            'correo' => $validated['correo'],
            'rol' => $usuarioModel->rol,
            'password' => $validated['password'],
            'espacio_total' => $usuarioModel->espacio_total,
        ];
        $user = $this->usuarioService->updateUser($usuarioModel->id, $data);
        return redirect()->route('home.index')->with('success', 'Perfil actualizado correctamente');
    }

}
