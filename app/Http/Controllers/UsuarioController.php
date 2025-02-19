<?php

namespace App\Http\Controllers;

// use App\Services\UsuarioService;
use Illuminate\Http\Request;
use App\Core\ListaUsuario;
use Illuminate\Http\JsonResponse;

class UsuarioController extends Controller
{
    // protected $usuarioService;

    // private ListaUsuario $usuarios;
    protected $listaUsuario;

    public function __construct(ListaUsuario $listaUsuario)
    {
        // $this->usuarioService = $usuarioService;
        $this->listaUsuario = $listaUsuario;
    }

    public function index(): JsonResponse
    {
        // return response()->json($this->usuarioService->getAllUsers());
        return response()->json($this->listaUsuario->listar());
        //view();
        //dd($listaProducto,$listaProducto[0]->ConvertToProducto());
    }

    public function store(Request $request): JsonResponse
    {
        $usuario = $this->listaUsuario->agregar($request->all());
        return response()->json(data: $usuario, 201);
    }

}

