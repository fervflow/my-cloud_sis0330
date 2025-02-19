<?php 
namespace App\Core;
use App\Core\Usuario;
use App\Core\Services\UsuarioService;

class ListaProducto{
    private Array $listaUsuario;
    private UsuarioService $service;
    public function __construct() {
        $this->service = new UsuarioService();
    }
    public function add(){}
    public function list(){
        return $this->service->getUsuarios();
    }
    public function edit(){}

}