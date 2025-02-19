<?php
namespace App\Core;
use App\Core\Usuario;
use App\Core\Validar;
use App\Core\Services\UsuarioService;

class ListaUsuario{
    private Array $listaUsuario;
    private UsuarioService $usuarioService;
    public function __construct() {
        $this->usuarioService = new UsuarioService();
    }
    public function add(Usuario $usu){
        if(!Validar::isnull($usu->getNombre())  && !Validar::isnull($usu->getcorreo()))
            return $this->usuarioService->add($usu);
        return null;
    }
    public function list(){
        return $this->usuarioService->getUsuarios();
    }
    public function edit(){}

}
