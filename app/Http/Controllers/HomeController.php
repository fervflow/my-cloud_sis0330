<?php

namespace App\Http\Controllers;

use App\Core\Services\UsuarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function __construct(
        private UsuarioService $usuarioService,
    )
    { }
    public function index()
    {
        // Obtener todos los usuarios
        $usuarios = $this->usuarioService->getUsuarios();
        Log::alert("controller.....");

        // Pasar los usuarios a la vista
        return view('Home.index', compact('usuarios'));
    }
}
