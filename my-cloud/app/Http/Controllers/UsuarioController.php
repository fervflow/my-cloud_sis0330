<?php

namespace App\Http\Controllers;

use App\Services\UsuarioService;
use Illuminate\Http\Request;
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
        return response()->json($this->usuarioService->getAllUsers());
    }

    public function store(Request $request): JsonResponse
    {
        $usuario = $this->usuarioService->createUser($request->all());
        return response()->json($usuario, 201);
    }
}

