<?php

namespace App\Http\Controllers;

use App\Core\Services\UsuarioService;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    //
    public function __construct(
        private UsuarioService $usuarioService,
    )
    { }
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        if ($searchTerm) {
            $usuarios = $this->usuarioService->searchUsuarios($searchTerm);
        } else {
            $usuarios = $this->usuarioService->getUsuarios();
        }
        $usuario = Auth::user();
        return view('Admin.index', compact('usuarios', 'usuario'));
    }
}
