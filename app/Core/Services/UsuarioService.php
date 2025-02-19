<?php
namespace App\Core\Services;
use App\Core\Usuario;
use App\Models\UsuarioModel;

class UsuarioService{

    public function add(Usuario $usuario){}
    public function getUsuarios(){
        return UsuarioModel::get();
    }
    public function edit(){}

}
