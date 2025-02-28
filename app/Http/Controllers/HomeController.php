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
}
