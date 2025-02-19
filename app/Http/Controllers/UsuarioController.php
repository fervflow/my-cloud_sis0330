<?php

namespace App\Http\Controllers;

use App\Services\UsuarioService;
use Illuminate\Http\Request;
use App\Core\ListaUsuario;
use Illuminate\Http\JsonResponse;

class UsuarioController extends Controller
{
    protected $usuarioService;

    private ListaUsuario $usuarios;

    /*public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->usuarioService->getAllUsers());
    }

    public function store(Request $request): JsonResponse
    {
        $usuario = $this->usuarioService->createUser($request->all());
        return response()->json($usuario, 201);
    }*/

    public function __construct(){
        $this->usuarios = new ListaUsuario();
    }
    public function index(){

        $listaUsuario = $this->usuarios->list();
        //view();
        //dd($listaProducto,$listaProducto[0]->ConvertToProducto());
    }
}

