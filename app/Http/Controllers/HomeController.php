<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\ListaUsuario;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    //
    protected $listaUsuario;

    public function __construct()
    {
        $this->listaUsuario = new ListaUsuario();
    }
    public function index()
    {
        // Obtener todos los usuarios
        $usuarios = $this->listaUsuario->list();
        Log::alert("controller.....");

        // Pasar los usuarios a la vista
        return view('Home.index', compact('usuarios'));
    }
}
