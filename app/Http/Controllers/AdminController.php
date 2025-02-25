<?php

namespace App\Http\Controllers;

use App\Core\Services\UsuarioService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    //
    public function __construct(
        private UsuarioService $usuarioService,
    )
    { }
    public function index()
    {
        // Obtener todos los usuarios
        $usuarios = $this->usuarioService->getUsuarios();
        // Pasar los usuarios a la vista
        return view('Admin.index', compact('usuarios'));
    }
}
