<?php
namespace App\Core;
use App\Core\Usuario;
use App\Core\Services\UsuarioService;

class ListaUsuario{
    private Array $listaUsuario;
    private UsuarioService $usuarioService;
    public function __construct() {
        $this->usuarioService = new UsuarioService();
    }

    public function agregar(){}

    public function listar(){
        return $this->usuarioService->getUsuarios();
    }

    public function editar(){}

}
